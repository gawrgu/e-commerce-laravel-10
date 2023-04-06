@extends('layouts.app')
@section('title', 'Search Product')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4>
                        Search Results
                        <div class="underline mb-4"></div>
                    </h4>
                </div>
                @forelse ($searchProducts as $item)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-card-img">
                                        <label class="stock bg-success">New</label>
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
                                </div>
                                <div class="col-md-9">
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $item->brand }}</p>
                                        <h5 class="product-name">
                                            <a
                                                href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">IDR {{ number_format($item->selling_price) }}</span>
                                            {{-- <span class="original-price">IDR {{ $item->original_price }}</span> --}}
                                        </div>
                                        <p style="height: 45px; overflow:hidden">
                                            <b>Description : </b> {{ $item->description }}
                                        </p>
                                        <a href="{{ url('categories/' . $item->categories->slug . '/' . $item->slug) }}"
                                            class="btn btn-sm btn-outline-info">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No such product found.</h4>
                    </div>
                @endforelse
                <div class="col-md-10">
                    {{ $searchProducts->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
