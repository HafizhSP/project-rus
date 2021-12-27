@extends('admin.layouts.master')

@section('title', 'Kelola Reseller')

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
                Kelola Reseller
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/reseller') }}"> List Reseller</a>
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
            <h3 class="block-title"><i class="fa fa-users"></i> List Reseller</h3>
            <div class="block-options">
                <a class="btn btn-info" href="{{ url('/manage/reseller/create') }}"><i class="fa fa-plus"></i> Reseller Baru</a>
            </div>
        </div>
        <div class="block-content">
            <!-- Search Form -->
            <form action="{{ url('/') }} method=" get">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <select class="custom-select" name="sts">
                                <option value="">Cari Tipe :</option>
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
                <input type="hidden" name="p" value="1" />
            </form>
            <!-- END Search Form -->

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-left">Saldo</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Terakhir Masuk</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resellers as $reseller)
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{ $reseller->id }}
                            </td>
                            <td class="font-size-sm">
                                {{ $reseller->first_name . ' ' . $reseller->last_name }}
                            </td>
                            <td class="font-size-sm">
                                {{ $reseller->email }}
                            </td>
                            <td class="text-left font-size-sm">
                                Rp. {{number_format($reseller->balance,0,",",".")}}
                            </td>
                            <td class="text-center">
                                <span class="badge badge-warning">STANDARD</span>
                            </td>
                            <td class="text-center font-size-sm">
                                <div class="d-inline-flex">
                                    <div class="col-12">
                                        <span class="d-block">{{date('d M Y', strtotime($reseller->last_login))}}</span>
                                        <small class="d-block">{{date('H:i A', strtotime($reseller->last_login))}}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if($reseller->status == 1)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('reseller.edit', $reseller->id) }}" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
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

<!-- Sweet Alert -->
@if(session('success'))
<script>
    Swal.fire(
        'Success!',
        "{{ session('success') }}",
        'success'
    )
</script>
@elseif(session('errors'))
<script>
    Swal.fire(
        'Error!',
        "{{$errors->first()}}",
        'error'
    )
</script>
@endif
@endpush