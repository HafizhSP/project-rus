@extends('admin.layouts.master')

@section('title', 'List Produk')

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
                List Produk
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ route('list.index') }}"> List Produk</a>
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
            <h3 class="block-title"><i class="fa fa-list"></i> Produk</h3>
            <div class="block-options">
                <a class="btn btn-info" href="{{ route('list.create') }}"><i class="fa fa-plus"></i> Produk Baru</a>
            </div>
        </div>
        <div class="block-content">
            <!-- Search Form -->
            <form action="{{ url('/') }} method=" get">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <select class="custom-select" name="sts">
                                <option value="">Cari Sosmed :</option>
                                <option value="0">Pending</option>
                                <option value="1">Processing</option>
                                <option value="2">Completed</option>
                                <option value="3">Partial</option>
                                <option value="4">Canceled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="custom-select" name="sts">
                                <option value="">Cari Kategori :</option>
                                <option value="0">Pending</option>
                                <option value="1">Processing</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="custom-select" name="sts">
                                <option value="">Cari status :</option>
                                <option value="0">Pending</option>
                                <option value="1">Processing</option>
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

            <!-- List Pemesanan Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga (/1K)</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Server (ID)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{ $product->id }}
                            </td>
                            <td class="text-center font-size-sm">
                                {{ $product->name }}
                            </td>
                            <td class="text-center font-size-sm">
                                {{ $product->serviceCategory->name }}
                            </td>
                            <td class="font-size-sm text-center">
                                Rp. {{number_format($product->hjual,0,",",".")}}
                            </td>
                            <td class="text-center">
                                @if($product->status == 1)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-warning">Nonaktif</span>
                                @endif
                            </td>

                            <td class="font-size-sm text-center">
                                {{ $product->apiVendor->name }} (<i>{{ $product->api_id }}</i>)
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('list.edit', $product->id) }}" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a onclick="$('#deleteForm_{{$product->id}}').submit();" class="btn btn-sm btn-alt-secondary" data-toggle="tooltip" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <form action="{{ route('list.destroy' , $product->id)}}" id="deleteForm_{{$product->id}}" method="POST">
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
            aaSorting: [],
        });
    });
</script>
@endpush