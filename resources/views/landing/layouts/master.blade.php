<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - SMMReseller</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keyword" content="@yield('meta-keyword')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('landing.includes.opengraph')

    @if(env('APP_ENV') === 'development')
    <meta name="robots" content="noindex,nofollow">
    @elseif(env('APP_ENV') === 'production')
    <meta name="robots" content="index,follow">
    @endif

    @include('landing.includes.style')

    <!-- CSS Page -->
    @stack('style')
    <!-- END CSS Page -->
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- ========== HEADER ========== -->
        @include('landing.includes.header')
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <div id="main" class="main">
            @yield('content')
            <!-- ========== FOOTER ========== -->
            @include('landing.includes.footer')
            <!-- ========== END FOOTER ========== -->
        </div>
        <!-- ========== END MAIN CONTENT ========== -->
    </div>
    <!-- END Wrapper -->

    @include('landing.includes.script')

    <!-- JS Page -->
    @stack('script')
    <!-- END JS Page -->

</body>

</html>