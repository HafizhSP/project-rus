@extends('admin.layouts.master')

@section('title', 'List API Vendor')

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
                List API Vendor
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/api/vendor') }}"> List API Vendor</a>
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
            <h3 class="block-title"><i class="fa fa-globe-asia"></i> API Vendor</h3>
            <div class="block-options">
                <a class="btn btn-info" href="{{ route('vendor.create') }}"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="block-content">
            <!-- List Pemesanan Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center" style="min-width: 150px">Nama</th>
                            <th class="text-center">URL</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{ $vendor->id }}
                            </td>
                            <td class="text-center font-size-sm">
                                {{ $vendor->name }}
                            </td>
                            <td class="text-center">
                                <small>{{ $vendor->url }}</small>
                            </td>
                            <td class="text-center">
                                @if($vendor->status == 1)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-warning">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-center font-size-sm">
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('vendor.edit', $vendor->id) }}" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a onclick="$('#deleteForm_{{$vendor->id}}').submit();" class="btn btn-sm btn-alt-secondary" data-toggle="tooltip" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <form action="{{ route('vendor.destroy' , $vendor->id)}}" id="deleteForm_{{$vendor->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END List Pemesanan Table -->
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