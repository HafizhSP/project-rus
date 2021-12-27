@extends('admin.layouts.master')

@section('title', 'Kelola Pesanan')

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
                Kelola Pesanan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/order') }}"> List Pesanan</a>
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
            <h3 class="block-title"><i class="fa fa-shopping-cart"></i> List Pesanan</h3>
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
                <input type="hidden" name="p" value="1" />
            </form>
            <!-- END Search Form -->

            <!-- List Sosial Media Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-left" style="min-width: 200px">Target</th>
                            <th class="text-center">Jumlah</th>
                            <th>Status</th>
                            <th class="text-left" style="min-width: 60px">Harga</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                <a href="javascript:void(0)" id="{{ $order->id }}" onclick="copyId({{ $order->id }})" data-toggle="tooltip" data-animation="true" data-placement="top" title="Copy">
                                    {{ $order->id }}
                                </a>
                            </td>
                            <td>
                                <div class="list-deskripsi d-inline-flex">
                                    @php
                                    $thumbnail = $order->serviceProduct->serviceCategory->serviceSocmed->thumbnail;
                                    @endphp
                                    <img class="rounded image-deskripsi align-self-center" src="{{ asset("storage/images/socmed/$thumbnail") }}" height="40" width="40">
                                    <div class="col-12">
                                        <span class="title" style="display: block; font-size: 14px;">
                                            <b>
                                                {{ $order->serviceProduct->name }}
                                            </b>
                                        </span>
                                        <span class="sub-title" style="display: block; font-size: 13px;"><b>{{ $order->serviceProduct->serviceCategory->name }}</b></span>
                                        <span class="sub-title mt-2" style="display: block; font-size: 12px;">Link : <a id="href_{{ $order->id }}" href="{{ $order->target }}" target="_blank"><b id="target_{{ $order->id }}">{{ $order->target }} </b></a> </span>
                                        <span class="sub-title" style="display: block; font-size: 12px;">Jumlah Awal : <b id="start_{{ $order->id }}">{{ $order->start }}</b></span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center font-size-sm">{{ $order->amount }}</td>
                            <td id="status_{{ $order->id }}">
                                @if ($order->status == "Pending")
                                <span class="badge badge-warning">Pending</span>
                                @elseif ($order->status == "Processing")
                                <span class="badge badge-info">Processing</span>
                                @elseif ($order->status == "Completed")
                                <span class="badge badge-success">Completed</span>
                                @elseif ($order->status == "Canceled")
                                <span class="badge badge-danger">Canceled</span>
                                @endif
                            </td>
                            <td class="text-left font-size-sm">
                                Rp. {{number_format($order->price,0,",",".")}}
                            </td>
                            <td class="text-center font-size-sm">
                                <div class="d-inline-flex">
                                    <div class="col-12">
                                        <span class="d-block">{{date('d F Y', strtotime($order->created_at))}}</span>
                                        <small class="d-block">{{date('H:i A', strtotime($order->created_at))}}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="font-size-sm">
                                {{ $order->user->first_name . ' ' . $order->user->last_name }}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)" onclick="detail({{ $order->id }})" data-toggle="tooltip" title="Edit">
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


<!-- Detail Order -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Detail Pesanan <span class="text-info" id="detail_id"></span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <label for="target">Target <span class="text-danger">*</span></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="target" name="target" placeholder="Your Target" required value="{{ old('target') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <label for="start">Start <span class="text-danger">*</span></label>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="start" name="start" placeholder="0" required value="{{ old('start') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <label for="start">Status <span class="text-danger">*</span></label>
                                    </td>
                                    <td>
                                        <select class="custom-select" id="status" name="status" required>
                                            <option value="Pending">Pending</option>
                                            <option value="Processing">Processing</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Canceled">Canceled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <label for="start">Status <span class="text-danger">*</span></label>
                                    </td>
                                    <td>
                                        <textarea class="form-control" id="custom_field" name="custom_field" required cols="50" rows="5"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateButton" data-id="0">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Detail Order -->
@endsection


@push('script')
<!-- Datatables -->
<script src="{{ asset('panel/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/datatables.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/service/order.js') }}"></script>

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