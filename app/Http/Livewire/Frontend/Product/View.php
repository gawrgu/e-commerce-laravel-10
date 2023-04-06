<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Whislist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $productColor, $prodColSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Whislist::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                // session()->flash('error', 'Whishlist already to added');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Whishlist already to added',
                    'type' => 'warning',
                    'detail' => 409
                ]);
                return false;
            } else {
                Whislist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('whislistAddedUpdated');
                // session()->flash('message', 'whishlist has been added');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'whishlist has been added',
                    'type' => 'success',
                    'detail' => 200
                ]);
            }
        } else {
            // session()->flash('error', 'Please login to add whishlist');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add whishlist',
                'type' => 'error',
                'detail' => 401
            ]);
            return false;
        }
    }

    public function AddCart(Int $productId)
    {
        if (Auth::check()) {
            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', 0)->exists()) {
                // check for product color quantity and add to cart
                if ($this->product->productColors->count() > 1) {
                    if ($this->prodColSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added in cart!',
                                'type' => 'info',
                                'detail' => 200
                            ]);
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity >= $this->quantityCount) {
                                    // insert product to cart
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added to cart',
                                        'type' => 'success',
                                        'detail' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' Quantity Avaible!',
                                        'type' => 'error',
                                        'detail' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of Stock!',
                                    'type' => 'danger',
                                    'detail' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color!',
                            'type' => 'info',
                            'detail' => 404
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already added in cart!',
                            'type' => 'info',
                            'detail' => 200
                        ]);
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                // insert product to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added to cart',
                                    'type' => 'success',
                                    'detail' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' Quantity Avaible!',
                                    'type' => 'error',
                                    'detail' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock!',
                                'type' => 'error',
                                'detail' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product not found!',
                    'type' => 'warning',
                    'detail' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add Cart',
                'type' => 'error',
                'detail' => 401
            ]);
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColSelectedQuantity = $productColor->quantity;
        if ($this->prodColSelectedQuantity == 0) {
            $this->prodColSelectedQuantity = 'outOfStock';
        }
    }

    public function moun($category, $product, $productColor)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
