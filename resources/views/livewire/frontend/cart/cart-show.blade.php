<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($cart as $value)
                            @if ($value->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a
                                                href="{{ url('categories/' . $value->product->categories->slug . '/' . $value->product->slug) }}">
                                                <label class="product-name">
                                                    @if ($value->product->productImages->count() > 0)
                                                        <img src="{{ asset('storage/uploads/product/' . $value->product->productImages[0]->image) }}"
                                                            style="width: 50px; height: 50px" alt="">
                                                        {{ $value->product->name }}
                                                    @else
                                                        <img src="{{ asset('storage/uploads/default.png') }}"
                                                            style="width: 50px; height: 50px" alt="">
                                                        {{ $value->product->name }}
                                                    @endif
                                                    @if ($value->productColor)
                                                        @if ($value->productColor->color)
                                                            <span>- Color:
                                                                {{ $value->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">IDR {{ $value->product->selling_price }} </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button"
                                                        wire:click="decrementQuantity({{ $value->id }})"
                                                        wire:loading.attr="disable" class="btn btn1"><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $value->quantity }}"
                                                        class="input-quantity" />
                                                    <button type="button"
                                                        wire:click="incrementQuantity({{ $value->id }})"
                                                        wire:loading.attr="disabled" class="btn btn1"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">IDR
                                                {{ number_format($value->product->selling_price * $value->quantity) }}
                                            </label>
                                            @php
                                                $totalPrice += $value->product->selling_price * $value->quantity;
                                            @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="removeCartItem({{ $value->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove
                                                        wire:target="removeCartItem({{ $value->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading
                                                        wire:target="removeCartItem({{ $value->id }})">
                                                        <i class="fa fa-trash"></i> Removing...
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>No Cart Items Avaible!</div>
                        @endforelse
                        <br>
                        <div class="row">
                            <div class="col-md-8 my-md-auto mt-3">
                                <h5>Get best deals & Offers <a href="{{ url('/categories') }}">Shop Now!</a></h5>
                            </div>
                            @if ($totalPrice > 0)
                                <div class="col-md-4 mt-3">
                                    <div class="shadow-sm bg-white p-3">
                                        <h4>Total :
                                            <span class="float-end">IDR {{ number_format($totalPrice) }}</span>
                                        </h4>
                                        <br>
                                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Check-Out</a>
                                    </div>
                                </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
