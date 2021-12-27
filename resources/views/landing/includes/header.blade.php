<!-- Navbar Section -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('home/assets/images/logo-inverted.png') }}" alt="SMM Reseller" height="20">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right">
                <li class="nav-item"><a class="nav-link js-scroll-trigger {{ Request::is('register') ? 'active' : '' }}" href="{{ asset('/register') }}">Pendaftaran Reseller</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger {{ Request::is('status-account') ? 'active' : '' }}" href="{{ asset('/status-account') }}">Status Pendaftaran</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger {{ Request::is('about-us') ? 'active' : '' }}" href="{{ asset('/about-us') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger {{ Request::is('contact') ? 'active' : '' }}" href="{{ asset('/contact') }}">Hubungi Kami</a></li>
                <li class="nav-item"><a class="btn-cta nav-link js-scroll-trigger" href="{{ url('/login') }}">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar End -->