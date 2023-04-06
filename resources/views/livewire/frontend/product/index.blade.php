<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    @foreach ($category->brands as $value)
                        <div class="card-body">
                            <label class="d-block">
                                <input type="checkbox" wire:model="brandInputs" value="{{ $value->name }}">
                                {{ $value->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceShort" wire:model="priceInputs" value="hight-to-low"> Hight to
                        Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceShort" wire:model="priceInputs" value="low-to-hight"> Low to
                        Hight
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">

            <div class="row">
                @forelse ($products as $item)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($item->quantity > 0)
                                    <label class="stock bg-success">In Stock: {{ $item->quantity }}</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif
                                @if ($item->productImages->count() > 0)
                                    <a href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                        <img src="{{ asset('storage/uploads/product/' . $item->productImages[0]->image) }}"
                                            alt="{{ $item->name }}">
                                @endif
                                </a>
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $item->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">IDR {{ number_format($item->selling_price) }}</span>
                                    {{-- <span class="original-price">IDR {{ $item->original_price }}</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No product avaible for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
