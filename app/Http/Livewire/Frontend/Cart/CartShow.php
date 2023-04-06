<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\ProductColor;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
    public function decrementQuantity($cartId)
    {
        $cartCount = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartCount) {
            if ($cartCount->productColor()->where('id', $cartCount->product_color_id)->exists()) {
                $productColor = $cartCount->productColor()->where('id', $cartCount->product_color_id)->first();
                if ($productColor->quantity >= $cartCount->quantity) {
                    $cartCount->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => ' Only ' . $productColor->quantity . ' Quantity Avaible!',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartCount->product->quantity >= $cartCount->quantity) {
                    $cartCount->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cartCount->product->quantity . ' Quantity Avaible!',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something an Error',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function incrementQuantity($cartId)
    {
        $cartCount = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartCount) {
            if ($cartCount->productColor()->where('id', $cartCount->product_color_id)->exists()) {
                $productColor = $cartCount->productColor()->where('id', $cartCount->product_color_id)->first();
                if ($productColor->quantity > $cartCount->quantity) {
                    $cartCount->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColor->quantity . ' Quantity Avaible!',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartCount->product->quantity > $cartCount->quantity) {
                    $cartCount->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cartCount->product->quantity . ' Quantity Avaible!',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something an Error',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function removeCartItem(Int $cartId)
    {
        $removeCartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($removeCartData) {
            $removeCartData->delete();
            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Removed Successfully',
                'type' => 'success',
                'status' => '200'
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Wrong!',
                'type' => 'error',
                'status' => '500'
            ]);
        }
    }
}
