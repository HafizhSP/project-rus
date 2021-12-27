@extends('admin.layouts.master')

@section('title', 'Riwayat Mutasi')

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
                Riwayat Mutasi
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Billing</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/bank') }}"> Riwayat Mutasi</a>
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
            <h3 class="block-title"><i class="fa fa-clipboard"></i> Mutasi</h3>
        </div>
        <div class="block-content">
            <!-- Search Form -->
            <form action="{{ url('/') }} method=" get">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <select class="custom-select" name="sts">
                                <option value="">Cari status :</option>
                                <option value="0">Pending</option>
                                <option value="1">Processing</option>
                                <option value="2">Completed</option>
                                <option value="3">Partial</option>
                                <option value="4">Canceled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" class="form-control" name="s" id="s" placeholder="Link/Username/ID..">
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

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">Invoice</th>
                            <th>Bank</th>
                            <th class="text-center">Desc</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Total (Rp)</th>
                            <th class="text-center">Balance (Rp)</th>
                            <th class="text-center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center font-size-sm">
                                <span class="font-w600">111</span>
                            </td>
                            <td>
                                BCA
                            </td>
                            <td class="font-size-sm">
                                TRSF E-BANKING CR 09/26 95031 LIKE 100 LEO HANDR Y LEO HANDRY
                            </td>
                            <td class="text-center font-size-sm">
                                CR
                            </td>
                            <td class="text-center font-size-sm">
                                35.620
                            </td>
                            <td class="text-center font-size-sm">
                                12.369.996
                            </td>
                            <td class="text-center font-size-sm">
                                <span class="d-block">05 May 2021</span>
                                <small class="d-block">13:39:32</small>
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