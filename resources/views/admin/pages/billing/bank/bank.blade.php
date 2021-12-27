@extends('admin.layouts.master')

@section('title', 'Kelola Bank')

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
                Kelola Bank
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Billing</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/bank') }}"> Kelola Bank</a>
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
            <h3 class="block-title"><i class="fa fa-piggy-bank"></i> Bank</h3>
            <div class="block-options">
                <a class="btn btn-info" href="{{ route('bank.create') }}"><i class="fa fa-plus"></i> Bank Baru</a>
            </div>
        </div>
        <div class="block-content">

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama Bank</th>
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                        <tr>
                            <td class="text-center font-size-sm">
                                <span class="font-w600">{{ $bank->id }}</span>
                            </td>
                            <td>
                                <div class="list-deskripsi d-inline-flex">
                                    <img class="rounded image-deskripsi align-self-center" src="{{ asset("storage/images/bank/$bank->thumbnail") }}" height="40" width="80">
                                    <div class="col-12">
                                        <span class="title font-weight-bold font-size-sm" style="display: block;">
                                            {{ $bank->name }}
                                        </span>
                                        <span class="sub-title mt-2 " style="display: block; font-size: 11px;"><b>A/N :</b> {{ $bank->an }}</span>
                                        <span class="sub-title " style="display: block; font-size: 11px;"><b>No. Rek :</b> {{ $bank->no_rek }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center font-size-sm">
                                {{ $bank->type }}
                            </td>
                            <td class="text-center">
                                @if($bank->status == 1)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-warning">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('bank.edit', $bank->id) }}" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a onclick="$('#deleteForm_{{$bank->id}}').submit();" class="btn btn-sm btn-alt-secondary" data-toggle="tooltip" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <form action="{{ route('bank.destroy' , $bank->id)}}" id="deleteForm_{{$bank->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                </form>
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
@endpush