@extends('admin.layouts.master')

@section('title', 'Riwayat Login')

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
                Riwayat Login
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/admin/history') }}"> Riwayat Login</a>
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
            <h3 class="block-title"><i class="fa fa-history"></i> Riwayat Login</h3>
        </div>
        <div class="block-content">

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">Admin</th>
                            <th class="text-center">IP</th>
                            <th class="text-center">Browser</th>
                            <th class="text-center">OS</th>
                            <th class="text-center">Platform</th>
                            <th class="text-center">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                Hafizh SP
                            </td>
                            <td class="text-center font-size-sm">
                                149.113.59.94
                            </td>
                            <td class="text-center font-size-sm">
                                Chrome 93.0.4577.82
                            </td>
                            <td class="text-center font-size-sm">
                                OS X 10_15_7
                            </td>
                            <td class="text-center font-size-sm">
                                Desktop
                            </td>
                            <td class="text-center font-size-sm">
                                <div class="d-inline-flex">
                                    <div class="col-12">
                                        <span class="d-block">05 May 2021</span>
                                        <small class="d-block">13:39:32</small>
                                    </div>
                                </div>
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