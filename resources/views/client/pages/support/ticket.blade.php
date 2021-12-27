@extends('client.layouts.master')

@section('title', 'Tiket Bantuan')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Tiket Bantuan <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Butuh bantuan terkait transaksi maupun pesanan anda? Hubungi Kami Sekarang!</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Support</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/support/tickets') }}"> Ticket Bantuan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-info"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Berhubung anda menggunakan akun <b>DEMO</b>, anda tidak bisa menggunakan fitur ini</div>
        </div>

        <!-- List Tiket -->
        <div class="col-md-12">
            <a href="{{ url('/support/tickets/create') }}" class="btn btn-primary mb-3">Buat Tiket Baru</a>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-ticket-alt"></i> Riwayat Tiket</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="alert alert-warning"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Oke</div>
                    <!-- Search Form -->
                    <form action="{{ url('/') }}" method="get">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <select class="custom-select" name="sts">
                                        <option value="">Cari status :</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Terespon</option>
                                        <option value="99">Ditutup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <select class="custom-select" name="sbj">
                                        <option value="">Cari Subjek :</option>
                                        <option value="ORDER">ORDER</option>
                                        <option value="REFILL">REFILL</option>
                                        <option value="DEPOSIT">DEPOSIT</option>
                                        <option value="OTHER">OTHER</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Search Form -->

                    <!-- Data Table -->
                    <table class="table table-striped table-borderless table-vcenter">
                        <thead class="border-bottom">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-left">Subjek</th>
                                <th class="text-center">Status</th>
                                <th>Terakhir Diperbaharui</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-center font-size-sm">
                                    <span class="text-primary font-w600">12</span>
                                </td>
                                <td class="text-left font-size-sm">
                                    <a class="font-w600" href="{{ url('/') }}">OTHER
                                        <div class="font-size-sm text-muted mt-1">
                                            <span class="text-danger font-w600">Belum Dibaca</span> : <em>3 Pesan</em>
                                        </div>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                                <td class="font-size-sm">
                                    <span>Oleh
                                        <span class="text-danger font-w500">Hafizhsp</span>
                                        <br><em>05 May 2021 & 18:2</em>
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center font-size-sm">
                                    <span class="text-primary font-w600">12</span>
                                </td>
                                <td class="text-left font-size-sm">
                                    <a class="font-w600" href="{{ url('/') }}">OTHER
                                        <div class="font-size-sm text-muted mt-1">
                                            <span class="text-danger font-w600">Belum Dibaca</span> : <em>3 Pesan</em>
                                        </div>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                                <td class="font-size-sm">
                                    <span>Oleh
                                        <span class="text-secondary font-w500">Administrator</span>
                                        <br><em>05 May 2021 & 18:2</em>
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">No Data</td>
                                <td>No Data</td>
                                <td class="text-center">No Data</td>
                                <td>No Data</td>
                            </tr>

                        </tbody>
                    </table>
                    <!-- END Data Table -->
                </div>
            </div>
        </div>
        <!-- End List Ticket -->

    </div>
</div>

@endsection

@push('script')
@endpush