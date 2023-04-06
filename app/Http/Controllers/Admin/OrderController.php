<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // whereDate('created_at', $todayDate)
        $todayDate = Carbon::now()->format('d-m-y');
        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {
            return $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != null, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })
            ->paginate(5);

        return view('admin.order.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.order.show', compact('order'));
        } else {
            return redirect()->back()->with('error', 'No orders found!');
        }
    }
    public function update(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('success', 'Order Status Updated');
        } else {
            return redirect('admin/orders/' . $orderId)->with('error', 'No orders found!');
        }
    }

    public function viewInvoice(Int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(Int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice' . $orderId . '-' . $todayDate . '.pdf');
    }
    public function mailInvoice(Int $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/' . $orderId)->with('success', 'Invoice mail has send to ' . $order->email);
        } catch (\Exception $e) {
            return redirect('admin/orders/' . $orderId)->with('error', 'Something went wrong.!');
        }
    }
}
