@extends('client.layouts.master')

@section('title', 'SMM Reseller Panel Indonesia')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Hero -->
<div class="bg-image overflow-hidden" style="background-image: url('panel/assets/media/photos/photo16@2x.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Last Login 13 jam yang lalu</h2>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                        <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="javascript:void(0)">
                            <i class="fa fa-plus mr-1"></i> Buat Pesanan
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pesanan Bulan Ini</div>
                    <div class="font-size-h4 font-w400 text-danger">550</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pesanan Seluruhnya</div>
                    <div class="font-size-h4 font-w400 text-danger">1023</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Saldo</div>
                    <div class="font-size-h4 font-w400 text-danger">Rp. 550.500</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x ribbon ribbon-primary ribbon-modern" href="javascript:void(0)">
                <div class="ribbon-box">
                    <i class="fa fa-star-half-alt"></i>
                </div>
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Reseller</div>
                    <div class="font-size-h4 font-w600 text-danger text-uppercase">
                        Premium
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Stats -->

    <!-- Dashboard Charts -->
    <div class="row">
        <div class="col-lg-6">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">INFORMASI PESANAN BULAN INI</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content p-0 text-center">
                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard_v1.min.js which was auto compiled from _js/pages/be_pages_dashboard_v1.js) -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-earnings"></canvas></div>
                </div>
                <div class="block-content">
                    <div class="row items-push text-center py-3">
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-wallet fa-2x text-muted"></i>
                            <div class="text-muted mt-3">$148,000</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-angle-double-up fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+9% Earnings</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-ticket-alt fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+20% Tickets</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-users fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+46% Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">INFORMASI PESANAN TAHUNAN</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content p-0 text-center">
                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard_v1.min.js which was auto compiled from _js/pages/be_pages_dashboard_v1.js) -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-sales"></canvas></div>
                </div>
                <div class="block-content">
                    <div class="row items-push text-center py-3">
                        <div class="col-6 col-xl-3">
                            <i class="fab fa-wordpress fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+20% Themes</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-font fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+25% Fonts</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-archive fa-2x text-muted"></i>
                            <div class="text-muted mt-3">-10% Icons</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-paint-brush fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+8% Graphics</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Dashboard Charts -->

    <!-- PUSAT INFORMASI and PESANAN TERAKHIR -->
    <div class="row row-deck">
        <!-- Pusat Informasi -->
        <div class="col-lg-12">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Pusat Informasi</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <ul class="timeline timeline-alt">
                        <!-- System Event -->
                        <li class="timeline-event">
                            <div class="timeline-event-icon bg-dark">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <div class="timeline-event-block block invisible" data-toggle="appear">
                                <div class="block-header block-header-default">
                                    <small class="block-title text-muted">Informasi</small>
                                    <small class="block-options">
                                        <div class="timeline-event-time block-options-item font-size-sm text-muted">
                                            30 Aug 2021 | 21:44
                                        </div>
                                    </small>
                                </div>
                                <div class="block-content">
                                    <h4 class="font-weight-bold">Test 1</h4>
                                    <div class="content-information">
                                        Testing saja
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- END System Event -->
                    </ul>
                    <a class="block-title dropdown-item p-2 text-center text-muted" href="{{ url('/') }}"><b>View all
                            notifications</b></a>
                </div>
            </div>
        </div>
        <!-- END Pusat Informasi -->

        <!-- Latest Orders -->
        <div class="col-lg-12">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Pesanan Terakhir</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                            <thead>
                                <tr class="text-uppercase">
                                    <th class="font-w700">ID</th>
                                    <th class="text-left font-w700">Layanan</th>
                                    <th class="text-left font-w700">Link/Username</th>
                                    <th class="font-w700 text-center">Status</th>
                                    <th class="font-w700 text-left">Price
                                    <th class="font-w700 text-center">Tanggal</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <a class="font-w600" href="{{ url('/history') }}">#22</a>
                                    </td>
                                    <td class="text-left">
                                        [ <span class="font-w700 text-uppercase">INSTAGRAM FOLLOWERS INDONESIA</span> ]
                                        Instagram Followers Indonesia - Wanita [HQ] [Fast]
                                    </td>
                                    <td class="text-left">
                                        rizkapurnadi
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-warning">Pending</span>
                                    </td>
                                    <td class="text-left">
                                        Rp. 4.375
                                    </td>
                                    <td class="d-inline-flex text-center">
                                        <div class="col-12">
                                            <span class="d-block">05 May 2021</span>
                                            <small class="d-block">13:39:32</small>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="block-title dropdown-item p-2 text-center text-muted" href="{{ url('/history') }} ?>"><b>Check History
                                Order</b></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Latest Orders -->
    </div>
    <!-- END Customers and Latest Orders -->

</div>
<!-- END Page Content -->

@endsection