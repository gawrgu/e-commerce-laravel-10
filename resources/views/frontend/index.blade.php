@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($slider->image)
                        <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100" alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                <span>{{ $slider->title }}</span>
                            </h1>
                            <p class="text text-dark">
                                {{ $slider->description }}
                            </p>
                            <div>
                                <a href="{{ route('collection') }}" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h4>
                        Welcome to Laravel E-commerce Website
                    </h4>
                    <div class="underline"></div>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque numquam mollitia molestias dicta
                        dolorem nam! Quasi a ea, ab magni animi excepturi modi saepe ratione illo ipsam vitae incidunt.
                        Ea molestiae debitis rerum illo repudiandae mollitia nisi deleniti impedit, eaque, doloribus
                        tempora et deserunt beatae quo! Placeat minus illo consectetur vitae perferendis soluta eius?
                        Consequatur dolore, consectetur facere quas nemo repudiandae fuga voluptate hic repellendus
                        aliquam? Rem, ut deleniti, adipisci quos saepe consectetur commodi blanditiis aliquam nihil aut
                        voluptates perspiciatis? Suscipit est fugit officia illo consectetur nostrum molestias alias
                        omnis natus, quibusdam ipsam itaque sint iure deleniti incidunt provident at.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Trending Products
                        <div class="underline mb-4"></div>
                    </h4>
                </div>
                @if ($productTrending)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($productTrending as $item)
                                <div class="item">
                                    <div class="product-card">
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
                                                {{-- <span class="original-price">IDR {{ $item->original_price }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No trending product avaible.</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        New Arrivals
                        <a href="{{ route('arrival') }}" class="btn btn-outline-info float-end">Load More</a>
                        <div class="underline mb-4"></div>
                    </h4>
                </div>
                @if ($newArrivals)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($newArrivals as $item)
                                <div class="item">
                                    <div class="product-card">
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
                                                {{-- <span class="original-price">IDR {{ $item->original_price }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Arrivals product avaible.</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Featured Products
                        <a href="{{ route('featured') }}" class="btn btn-outline-info float-end">Load More</a>
                        <div class="underline mb-4"></div>
                    </h4>
                </div>
                @if ($featuredProduct)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($featuredProduct as $item)
                                <div class="item">
                                    <div class="product-card">
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
                                                {{-- <span class="original-price">IDR {{ $item->original_price }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Featured Products avaible.</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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
@endsection
