<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest()->paginate(5);
        return view('frontend.order.index', compact('order'));
    }

    public function show($oderId)
    {
        $totalPrice = 0;
        $order = Order::where('user_id', auth()->user()->id)->where('id', $oderId)->first();
        if ($order) {
            return view('frontend.order.show', compact('order', 'totalPrice'));
        } else {
            return redirect()->back()->with('message', 'No order found!');
        }
    }

    public function generateInvoice(Int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('frontend.user.invoice.mail-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice' . $orderId . '-' . $todayDate . '.pdf');
    }
}
