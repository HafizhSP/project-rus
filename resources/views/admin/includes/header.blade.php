<!-- Side Overlay-->
<aside id="side-overlay">
    <div class="bg-light">

        <!-- Side Header -->
        <div class="content-header border-bottom bg-dark">
            <div class="text-white font-w600">What's new on SMMReseller</div>
            <!-- Close Side Notification -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="ml-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Side Notification -->
        </div>
        <!-- END Side Header -->

        <!-- Content -->
        <div class="block block-bordered m-2 rounded">
            <div class="block-header block-header-default d-flex flex-column">
                <h3 class="block-title">Metode Pembayaran Baru !!</h3>
                <small>May 07, 2021</small>
            </div>
            <div class="block-content mb-3">
                JasaAllSosmed - Jasa All Sosmed kini menyediakan berbagai macam tambahan metode pembayaran baru. Mempermudah anda untuk melakukan checkout pesanan dimanapun dan kapanpun dengan waktu yang instant dan otomatis.
            </div>
            <!-- END Content -->

        </div>
        <!-- END Side Content -->
</aside>
<!-- END Side Overlay -->

<!-- Sidebar -->
<!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                SMM<span class="font-w400">Reseller</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Options -->
            <div class="dropdown d-inline-block ml-2">
                <a class="btn btn-sm btn-dual" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="si si-drop"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="default" href="#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('panel/assets/css/themes/amethyst.min.css') }}" href="#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('panel/assets/css/themes/city.min.css') }}" href="#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('panel/assets/css/themes/flat.min.css') }}" href="#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('panel/assets/css/themes/modern.min.css') }}" href="#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('panel/assets/css/themes/smooth.min.css') }}" href="#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a>
                    <!-- END Color Themes -->

                    <div class="dropdown-divider"></div>

                    <!-- Sidebar Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_light" href="#">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- Sidebar Styles -->

                    <div class="dropdown-divider"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_light" href="#">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_dark" href="#">
                        <span>Header Dark</span>
                    </a>
                    <!-- Header Styles -->
                </div>
            </div>
            <!-- END Options -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage') ? 'active' : '' }}" href="{{ url('/manage') }}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>

                <li class="nav-main-heading">Service</li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/order') ? 'active' : '' }}" href="{{ url('/manage/order') }}">
                        <i class="nav-main-link-icon fa fa-shopping-cart"></i>
                        <span class="nav-main-link-name">Kelola Pesanan</span>
                    </a>
                </li>
                <li class="nav-main-item {{ Request::is('manage/product') || Request::is('manage/product/*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
                        <i class="nav-main-link-icon fa fa-cart-plus"></i>
                        <span class="nav-main-link-name">Kelola Layanan</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/product/list') || Request::is('manage/product/list/*') ? 'active' : '' }}" href="{{ route('list.index') }}">
                                <span class="nav-main-link-name">List Product</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/product/category') || Request::is('manage/product/category/*') ? 'active' : '' }}" href="{{ route('category.index') }}">
                                <span class="nav-main-link-name">List Kategori</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/product/socmed') || Request::is('manage/product/socmed/*') ? 'active' : '' }}" href="{{ route('socmed.index') }}">
                                <span class="nav-main-link-name">List Sosmed</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/product/coupon') || Request::is('manage/product/coupon/*') ? 'active' : '' }}" href="{{ url('/manage/product/coupon') }}">
                                <span class="nav-main-link-name">Kelola Kupon</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item {{ Request::is('manage/api/*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
                        <i class="nav-main-link-icon fa fa-book-medical"></i>
                        <span class="nav-main-link-name">Kelola API Layanan</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/api/product') || Request::is('manage/api/product/*') ? 'active' : '' }}" href="{{ url('/manage/api/product') }}">
                                <span class="nav-main-link-name">API Layanan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/api/vendor') || Request::is('manage/api/vendor/*') ? 'active' : '' }}" href="{{ url('/manage/api/vendor') }}">
                                <span class="nav-main-link-name">API Vendor</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">User</li>
                <li class="nav-main-item {{ Request::is('manage/reseller') || Request::is('manage/reseller/*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Reseller</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/reseller') || Request::is('manage/reseller/create') || Request::is('manage/reseller/*/edit') ? 'active' : '' }}" href="{{ url('/manage/reseller') }}">
                                <span class="nav-main-link-name">List Reseller</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/reseller/register') ? 'active' : '' }}" href="{{ url('/manage/reseller/register') }}">
                                <span class="nav-main-link-name">Pendaftar Reseller</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item {{ Request::is('manage/admin') || Request::is('manage/admin/*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
                        <i class="nav-main-link-icon fa fa-user-lock"></i>
                        <span class="nav-main-link-name">Admin</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/admin') || Request::is('manage/admin/create') || Request::is('manage/admin/*/edit') ? 'active' : '' }}" href="{{ url('/manage/admin') }}">
                                <span class="nav-main-link-name">List Admin</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/admin/history') ? 'active' : '' }}" href="{{ url('/manage/admin/history') }}">
                                <span class="nav-main-link-name">Riwayat Login</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">Billing</li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/invoice') ? 'active' : '' }}" href="{{ url('/manage/invoice') }}">
                        <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>
                        <span class="nav-main-link-name">Kelola Invoice</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/bank') || Request::is('manage/bank/*') ? 'active' : '' }}" href="{{ url('/manage/bank') }}">
                        <i class="nav-main-link-icon fa fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Kelola Bank</span>
                    </a>
                </li>
                @php
                $countKonfirmasiPemb = \App\Models\PaymentConfirmation::where('baca', 0)->count();
                @endphp
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/payment') ? 'active' : '' }}" href="{{ url('/manage/payment') }}">
                        <i class="nav-main-link-icon fa fa-credit-card"></i>
                        <span class="nav-main-link-name">Konfirmasi Pembayaran</span>@if ($countKonfirmasiPemb > 0) <span class="badge badge badge-danger badge-pill">{{$countKonfirmasiPemb}}</span> @endif
                    </a>
                </li>
                <li class="nav-main-item {{ Request::is('manage/statistic') || Request::is('manage/mutation') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);">
                        <i class="nav-main-link-icon fa fa-chart-line"></i>
                        <span class=" nav-main-link-name">Statistik</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/statistic') ? 'active' : '' }}" href="{{ url('/manage/statistic') }}">
                                <span class="nav-main-link-name">Statistik</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Request::is('manage/mutation') ? 'active' : '' }}" href="{{ url('/manage/mutation') }}">
                                <span class="nav-main-link-name">Riwayat Mutasi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">Support</li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/ticket')  ? 'active' : '' }}" href="{{ url('/manage/ticket') }}">
                        <i class="nav-main-link-icon fa fa-ticket-alt"></i>
                        <span class="nav-main-link-name">Kelola Tiket</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/information') ? 'active' : '' }}" href="{{ url('/manage/information') }}">
                        <i class="nav-main-link-icon fa fa-info-circle"></i>
                        <span class="nav-main-link-name">Kelola Informasi</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('manage/tips')  ? 'active' : '' }}" href="{{ url('/manage/tips') }}">
                        <i class="nav-main-link-icon fa fa-hands-helping"></i>
                        <span class="nav-main-link-name">Kelola Panduan Reseller</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual d-flex align-items-center" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{ asset('panel/assets/media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
                    <span class="d-none d-sm-inline-block ml-2">Adam</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary-dark rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('panel/assets/media/avatars/avatar7.jpg') }}" alt="">
                        <p class="mt-2 mb-0 text-white font-w500">Adam Smith</p>
                        <p class="mb-0 text-white-50 font-size-sm">Web Developer</p>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/account/profile') }}">
                            <span class="font-size-sm font-w500">Profile</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/account/history') }}">
                            <span class="font-size-sm font-w500">History Login</span>
                        </a>

                        <div role="separator" class="dropdown-divider"></div>

                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="font-size-sm font-w500">Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="text-primary">•</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-2 bg-primary-dark text-center rounded-top">
                        <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                    </div>
                    <ul class="nav-items mb-0">
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-clock text-danger"></i>
                                </div>
                                <div class="pr-2">
                                    <div class="font-w600">COMMING SOON</div>
                                    <!-- <span class="font-w500 text-muted">-</span> -->
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Notifications Dropdown -->

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
            </button>
            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-white">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->