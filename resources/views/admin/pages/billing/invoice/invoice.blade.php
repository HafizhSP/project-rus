@extends('admin.layouts.master')

@section('title', 'Kelola Invoice')

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
                Kelola Invoice
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Billing</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/invoice') }}"> Kelola Invoice</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <!-- List Pemesanan -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-file-invoice-dollar"></i> Invoice</h3>
        </div>
        <div class="block-content">

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th>Uplink</th>
                            <th class="text-center">Via</th>
                            <th class="text-center">Jumlah</th>
                            <th>Pengirim</th>
                            <th class="text-center">Bukti</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-size-sm">
                                hafizhsp
                            </td>
                            <td class="text-center font-size-sm">
                                E-Wallets - DANA
                            </td>
                            <td class="text-center font-size-sm">
                                Rp. 254.250
                            </td>
                            <td class="font-size-sm">
                                -
                            </td>
                            <td class="text-center font-size-sm">
                                <a href="#">Lihat Disini</a>
                            </td>
                            <td class="text-center font-size-sm">
                                <span class="d-block">05 May 2021</span>
                                <small class="d-block">13:39:32</small>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <td class="text-center ">
                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END List Sosial Media Table -->
        </div>
    </div>
    <!-- END List Pemesanan -->
</div>
@endsection

@push('script')
<!-- Datatables -->
<script src="{{ asset('panel/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/datatables.js') }}"></script>

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
        });
    });
</script>
@endpush