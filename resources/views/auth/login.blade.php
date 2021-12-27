<!doctype html>
<html lang="en">

<head>
    <title>Masuk Layanan - SMMReseller</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Halaman Login Layanan SMMReseller.co.id Indonesia">
    <meta name="keyword" content="login smmreseller, masuk smmreseller, halaman login, smmreseller">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Masuk Layanan - SMMReseller">
    <meta property="og:site_name" content="SMMReseller">
    <meta property="og:description" content="Halaman Login Layanan SMMReseller.co.id Indonesia">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:image:width" content="">
    <meta property="og:image:height" content="">

    @if(env('APP_ENV') === 'development')
    <meta name="robots" content="noindex,nofollow">
    @elseif(env('APP_ENV') === 'production')
    <meta name="robots" content="index,follow">
    @endif

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('panel/assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('panel/assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('panel/assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('panel/assets/css/oneui.min.css') }}">

</head>

<body>
    <!-- Page Container -->

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('panel/assets/media/photos/photo28@2x.jpg');">
                <div class="row no-gutters bg-primary-dark-op">
                    <!-- Meta Info Section -->
                    <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
                        <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                            <div class="w-100">
                                <p class="mb-3">
                                    <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                                </p>
                                <a class="link-fx font-w600 font-size-h2 text-white" href="{{ url('/') }}">
                                    SMM<span class="font-w400">Reseller</span>
                                </a>
                                <p class="text-white-75 mt-2">
                                    Pusat penjualan layanan social media marketing di Indonesia.
                                </p>
                                <p class="text-white-75 mt-2">
                                    Bergabunglah bersama dengan ratusan reseller yang telah sukses di bisnis social media marketing.
                                </p>
                            </div>
                        </div>
                        <div class="p-4 p-xl-5 d-xl-flex justify-content-between align-items-center font-size-sm">
                            <p class="font-w500 text-white-50 mb-0">
                                <a href="{{ url('/') }}"><strong>SMMReseller.co.id</strong></a> &copy; <span data-toggle="year-copy"></span>
                            </p>
                            <ul class="list list-inline mb-0 py-2">
                                <li class="list-inline-item">
                                    <a class="text-primary font-w500" href="{{ url('/register') }}">Pendaftaran Reseller</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Meta Info Section -->

                    <!-- Main Section -->
                    <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-white">
                        <div class="p-3 w-100 d-lg-none text-center">
                            <a class="link-fx font-w600 font-size-h3 text-dark" href="index.html">
                                SMM<span class="font-w400">Reseller</span>
                            </a>
                        </div>
                        <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                            <div class="w-100">
                                <!-- Header -->
                                <div class="text-center mb-5">
                                    <p class="mb-3">
                                        <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                                    </p>
                                    <h1 class="font-w700 mb-2">
                                        Sign In
                                    </h1>
                                    <h2 class="font-size-base text-muted">
                                        Selamat Datang, Masuk dengan akun reseller anda
                                    </h2>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <div class="row no-gutters justify-content-center">
                                    <div class="col-sm-8 col-xl-6">
                                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-lg form-control-alt py-4" id="email" name="email" placeholder="Youremail@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt py-4" id="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a class="text-muted font-size-sm font-w500 d-block d-lg-inline-block mb-1" href="{{ url('/password/reset') }}">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-lg btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt mr-1 opacity-50"></i> Sign In
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END Sign In Form -->
                                <div class="text-center font-size-sm font-w500 text-muted mt-3">
                                    <p>Untuk akes akun demo isikan data dibawah ini:<br>
                                        Email: <b>demo@gmail.com</b><br>
                                        Password: <b>demo</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between font-size-sm text-center text-sm-left">
                            <p class="font-w500 text-black-50 py-2 mb-0">
                                <strong>OneUI 4.9</strong> &copy; <span data-toggle="year-copy"></span>
                            </p>
                            <ul class="list list-inline py-2 mb-0">
                                <li class="list-inline-item">
                                    <a class="text-muted font-w500" href="javascript:void(0)">Legal</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted font-w500" href="javascript:void(0)">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted font-w500" href="javascript:void(0)">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Main Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- OneUI JS Core -->
    <script src="{{ asset('panel/assets/js/oneui.core.min.js') }}"></script>

    <!-- OneUI JS -->
    <script src="{{ asset('panel/assets/js/oneui.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('panel/assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('panel/assets/js/pages/be_pages_dashboard_v1.min.js') }}"></script>
</body>

</html>