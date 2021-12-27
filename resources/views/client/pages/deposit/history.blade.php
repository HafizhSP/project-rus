@extends('client.layouts.master')

@section('title', 'Riwayat Deposit')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Riwayat Deposit <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">menampilkan semua riwayat pengisian saldo anda</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ route('deposit.create') }}"> Deposit</a>
                    </li>
                    <li class="breadcrumb-item">Riwayat</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="row">
        <!-- Statistik Pemesanan -->
        <div class="col-md-3">
            <a class="block block-rounded shadow block-link-pop d-flex flex-column border-left border-primary border-4x">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dd class="text-muted mb-0">Total Invoice</dd>
                        <dt class="font-w700 text-success">12</dt>
                    </dl>
                    <div class="item item-rounded">
                        <i class="fa fa-shopping-cart font-size-h2 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="block block-rounded shadow block-link-pop d-flex flex-column border-left border-primary border-4x">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dd class="text-muted mb-0">Deposit Sukses</dd>
                        <dt class="font-w700 text-success">Rp. 420.000</dt>
                    </dl>
                    <div class="item item-rounded">
                        <i class="fa fa-chart-line font-size-h2 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="block block-rounded shadow block-link-pop d-flex flex-column border-left border-primary border-4x">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dd class="text-muted mb-0">Bonus Deposit</dd>
                        <dt class="font-w700 text-success">Rp. 0</dt>
                    </dl>
                    <div class="item item-rounded">
                        <i class="fa fa-comments-dollar font-size-h2 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="block block-rounded shadow block-link-pop d-flex flex-column border-left border-primary border-4x">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dd class="text-muted mb-0">Total Deposit</dd>
                        <dt class="font-w700 text-success">Rp. 420.000</dt>
                    </dl>
                    <div class="item item-rounded">
                        <i class="fa fa-dollar-sign font-size-h2 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- END Statistik Pemesanan -->

        <!-- Riwayat Pemesanan -->
        <div class="col-md-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-list-ul"></i> Riwayat Topup</h3>
                    <input type="hidden" name="p" value="1" />
                </div>
                <div class="block-content">

                    <!-- Riwayat Pemesanan Table -->
                    <div class="table-responsive pb-3">
                        <table class="table table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-left" style="min-width: 200px">Via</th>
                                    <th class="text-left" style="min-width: 100px">Amount</th>
                                    <th class="text-left" style="min-width: 100px">Harga</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposits as $deposit)
                                <tr>
                                    <td class="text-center font-size-sm">
                                        <span class="font-w600 text-primary" onclick="detail(12)" style="cursor: pointer;">
                                            <strong>{{ $deposit->id }}</strong>
                                        </span>
                                    </td>
                                    <td class="text-left font-size-sm font-w600">
                                        {{ $deposit->bank->type . ' - ' . $deposit->bank->name }}
                                    </td>
                                    <td class="text-left font-size-sm">Rp. {{number_format($deposit->amount,0,",",".")}}</td>
                                    <td class="text-left font-size-sm">Rp. {{number_format($deposit->price,0,",",".")}}</td>
                                    <td class="text-center">
                                        @if($deposit->status == 1)
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                        @elseif($deposit->status == 2)
                                        <span class="badge badge-success">Lunas</span>
                                        @elseif($deposit->status == 3)
                                        <span class="badge badge-danger">Dibatalkan</span>
                                        @endif
                                    </td>
                                    <td class="text-center font-size-sm">
                                        <div class="d-inline-flex">
                                            <div class="col-12">
                                                <span class="d-block">{{date('d M Y', strtotime($deposit->created_at))}}</span>
                                                <small class="d-block">{{date('H:i A', strtotime($deposit->created_at))}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a type="button" href="{{ url('/deposit/history/') . '/' . $deposit->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-animation="true" data-placement="top" title="Detail">
                                            <i class="fa fa-list-ul"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Riwayat Pemesanan Table -->
                </div>
            </div>
        </div>
        <!-- END Riwayat Pemesanan -->
    </div>
</div>

@endsection

@push('script')
<!-- Datatables -->
<script src="{{ asset('panel/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/client/datatables.js') }}"></script>

<script>
    $(document).ready(function() {
        // DataTables Init
        $('.js-dataTable-full-pagination').dataTable({
            pagingType: "full_numbers",
            pageLength: 10,
            lengthMenu: [
                [5, 10, 15, 20],
                [5, 10, 15, 20]
            ],
            autoWidth: false,
            ordering: false
        });
    });
</script>
@endpush