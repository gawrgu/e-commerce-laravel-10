<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages->count() > 0)
                            {{-- <img src="{{ asset('storage/uploads/product/' . $product->productImages[0]->image) }}"
                                class="w-100" alt="Img"> --}}
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $value)
                                            <li><img src="{{ asset('storage/uploads/product/' . $value->image) }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn" hidden>
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No image added!
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            @if ($product->quantity)
                                <span class="label-stock bg-success">In Stock {{ $product->quantity }}</span>
                            @else
                                <span class="label-stock bg-danger">Out of Stock</span>
                            @endif
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->categories->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">IDR {{ number_format($product->original_price) }}</span>
                            <span class="original-price">IDR {{ number_format($product->selling_price) }}</span>
                        </div>

                        <div>
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        <input name="colorSelection" type="radio"
                                            wire:click="colorSelected({{ $colorItem->id }})">
                                        {{ $colorItem->color->name }}
                                    @endforeach
                                @endif
                                <div>
                                    @if ($this->prodColSelectedQuantity == 'outOfStock')
                                        <label class="btn btn-sm py-1 mt-2 text-white bg-danger">
                                            Out Of Stock</label>
                                    @elseif ($this->prodColSelectedQuantity > 0)
                                        <label class="colorSelection btn btn-sm py-1 mt-2 text-white bg-success">
                                            In Stock
                                            {{ $this->prodColSelectedQuantity }}</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn btn-sm py-1 mt-2 text-white bg-success">In Stock
                                        {{ $product->quantity }}</label>
                                @else
                                    <label class="btn btn-sm py-1 mt-2 text-white bg-danger">Out Of Stock</label>
                                @endif

                            @endif

                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <span wire:click="decrementQuantity" class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input wire:model="quantityCount" value="{{ $this->quantityCount }}" type="number"
                                    readonly class="input-quantity" />
                                <span wire:click="incrementQuantity" class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="AddCart({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="AddCart">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </span>
                                <span wire:loading wire:target="AddCart">
                                    <i class="fa fa-shopping-cart"></i> Adding...
                                </span>
                            </button>
                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishlist">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Related
                        @if ($category)
                            {{ $category->name }}
                        @endif
                        Products
                    </h3>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    @if ($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts as $item)
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if ($item->productImages->count() > 0)
                                                <a
                                                    href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                    <img src="{{ asset('storage/uploads/product/' . $item->productImages[0]->image) }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                            @else
                                                <a
                                                    href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                    <img src="{{ asset('storage/uploads/default.png') }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $item->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">IDR
                                                    {{ number_format($item->selling_price) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 p-2">
                                <h4>No Related Product Avaible.</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Related
                        @if ($product)
                            {{ $product->brand }}
                        @endif
                        Brands
                    </h3>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    @if ($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts as $item)
                                @if ($item->brand == "$product->brand")
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                @if ($item->productImages->count() > 0)
                                                    <a
                                                        href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                        <img src="{{ asset('storage/uploads/product/' . $item->productImages[0]->image) }}"
                                                            alt="{{ $item->name }}">
                                                    </a>
                                                @else
                                                    <a
                                                        href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                        <img src="{{ asset('storage/uploads/default.png') }}"
                                                            alt="{{ $item->name }}">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{ $item->brand }}</p>
                                                <h5 class="product-name">
                                                    <a
                                                        href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">IDR
                                                        {{ number_format($item->selling_price) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="col-md-12 p-2">
                                <h4>No Related Product Avaible.</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": false,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });

        });

        $('.four-carousel').owlCarousel({
            stagePadding: 16,
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endpush
