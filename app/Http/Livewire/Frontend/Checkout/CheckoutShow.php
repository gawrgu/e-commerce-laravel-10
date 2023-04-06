<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use Nette\Utils\Random;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmont = 0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules()
    {
        return [
            'fullname' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|min:10|max:12',
            'pincode' => 'required|string|min:5|max:6',
            'address' => 'required|string|max:500'
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'LaraEcom-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);
        foreach ($this->carts as $cartItem) {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);
            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }
        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            try {
                // Mail Send Successfully
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            } catch (\Exception $e) {
                // Something went wrong

            }
            session()->flash('message', 'Order Placed Successfully' . $order->email);
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Errors',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function totalProductAmont()
    {
        $this->totalProductAmont = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmont += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmont;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone;
        $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->userDetail->address;
        $this->totalProductAmont = $this->totalProductAmont();
        return view('livewire.frontend.checkout.checkout-show', [
            'itemTotalAmont' => $this->totalProductAmont
        ]);
    }
}
