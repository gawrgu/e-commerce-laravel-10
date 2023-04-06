<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="footer-heading">{{ $appSetting->website_name }}</h4>
                <div class="footer-underline"></div>
                <p>
                    {{ $appSetting->meta_description ?? 'Website Description' }}
                </p>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Quick Links</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                <div class="mb-2"><a href="{{ url('about-us') }}" class="text-white">About Us</a></div>
                <div class="mb-2"><a href="" class="{{ url('contact-us') }}">Contact Us</a></div>
                <div class="mb-2"><a href="#" class="text-white">Blogs</a></div>
                <div class="mb-2"><a href="#" class="text-white">Sitemaps</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Shop Now</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{ route('collection') }}" class="text-white">Collections</a></div>
                <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                <div class="mb-2"><a href="{{ route('arrival') }}" class="text-white">New Arrivals Products</a></div>
                <div class="mb-2"><a href="{{ route('featured') }}" class="text-white">Featured Products</a></div>
                <div class="mb-2"><a href="{{ route('cart') }}" class="text-white">Cart</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Reach Us</h4>
                <div class="footer-underline"></div>
                <div class="mb-2">
                    <p>
                        <i class="fa fa-map-marker"></i> {{ $appSetting->address ?? 'Website Address' }}
                    </p>
                </div>
                <div class="mb-2">
                    <a href="" class="text-white">
                        <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'Phone Number' }}
                    </a>
                </div>
                <div class="mb-2">
                    <a href="" class="text-white">
                        <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'Email' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class=""> &copy; 2022 - {{ $appSetting->website_name }}. All rights reserved.</p>
            </div>
            <div class="col-md-4">
                <div class="social-media">
                    Get Connected:
                    <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $appSetting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
