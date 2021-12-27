@extends('admin.layouts.master')

@section('title', 'Pendaftar Reseller')

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
                Pendaftar Reseller
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/reseller/register') }}"> Pendaftar Reseller</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        Pendaftar akan dihapus dari list secara otomatis jika tidak menyelesaikan pembayaran dalam 3 hari
    </div>

    <!-- List Pemesanan -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-user-clock"></i> Pendaftar Reseller</h3>
        </div>
        <div class="block-content">

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                1
                            </td>
                            <td class="font-size-sm">
                                <span class="d-block">Hafizh SP</span>
                                <small class="d-block font-italic">hafizhsp</small>
                            </td>
                            <td class="font-size-sm">
                                hafizhsalsabilap@gmail.com
                            </td>
                            <td class="text-center">
                                <span class="badge badge-info">STANDARD</span>
                            </td>
                            <td class="text-center font-size-sm">
                                <div class="d-inline-flex">
                                    <div class="col-12">
                                        <span class="d-block">05 May 2021</span>
                                        <small class="d-block">13:39:32</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-warning">BELUM</span>
                            </td>
                            <td class="text-center">
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