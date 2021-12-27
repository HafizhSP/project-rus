@extends('client.layouts.master')

@section('title', 'Riwayat Pesanan')

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
                Riwayat Pesanan <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">menampilkan semua log pemesanan anda</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Pesanan</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/service/history') }}"> Riwayat Pesanan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <!-- Riwayat Pemesanan -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-clock"></i> Riwayat Pemesanan</h3>
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

            <!-- Riwayat Pemesanan Table -->
            <div class="table-responsive pb-3">
                <table class="table table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 70px; min-width: 70px">ID</th>
                            <th class="text-left" style="min-width: 180px">Target</th>
                            <th class="text-left">Jumlah</th>
                            <th class="text-center">Status</th>
                            <th class="text-left" style="min-width: 100px">Harga</th>
                            <th class="text-left">Layanan</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listOrders as $order)
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control font-size-sm font-w600 text-primary" id="{{ $order->id }}" readonly value="{{ $order->id }}">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm" onclick="copyId({{ $order->id }})" data-toggle="tooltip" data-animation="true" data-placement="top" title="Copy">
                                            <i class="far fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control font-size-sm" id="link_{{ $order->id }}" readonly value="{{ $order->target }}">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm" onclick="copyTarget({{ $order->id }})" data-toggle="tooltip" data-animation="true" data-placement="top" title="Copy">
                                            <i class="far fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left font-size-sm">{{ $order->amount }}</td>
                            <td class="text-center">
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
                                Rp. {{ number_format($order->price,0,",",".") }}
                            </td>
                            <td class="text-left font-size-sm">
                                <span class="d-block">[<span class="font-w700 text-uppercase">{{ $order->serviceProduct->serviceCategory->name }}</span>]</span>
                                <span class="d-block">{{ $order->serviceProduct->name }}</span>
                            </td>
                            <td class="text-center font-size-sm">
                                <div class="d-inline-flex">
                                    <div class="col-12">
                                        <span class="d-block">{{date('d F Y', strtotime($order->created_at))}}</span>
                                        <small class="d-block">{{date('H:i A', strtotime($order->created_at))}}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" onclick="detail({{ $order->id }})" class="btn btn-info btn-sm" data-toggle="tooltip" data-animation="true" data-placement="top" title="Detail">
                                    <i class="fa fa-list-ul"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END Riwayat Pemesanan Table -->
        </div>
    </div>
    <!-- END Riwayat Pemesanan -->
</div>



<!-- Detail Modal -->
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
                                    <td>Jumlah Pesan</td>
                                    <td id="jml_pesan"></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Awal</td>
                                    <td id="jml_awal"></td>
                                </tr>
                                <tr>
                                    <td>Sisa</td>
                                    <td id="sisa"></td>
                                </tr>
                                <tr>
                                    <td>Pengembalian Uang</td>
                                    <td id="refunded"></td>
                                </tr>
                                <tr>
                                    <td>Tgl Pesan</td>
                                    <td id="date"></td>
                                </tr>
                                <tr>
                                    <td>Tgl Proses</td>
                                    <td id="date_proses"></td>
                                </tr>
                                <tr>
                                    <td>Tgl Selesai</td>
                                    <td id="date_selesai"></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>
                                        <textarea class="form-control" id="catatan" cols="50" rows="5" readonly></textarea>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Penggunaan Kupon</td>
                                    <td id="kupon"></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Detail Modal -->
@endsection

@push('script')
<!-- Datatables -->
<script src="{{ asset('panel/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/client/datatables.js') }}"></script>
<script src="{{ asset('panel/assets/custom/client/order/history.js') }}"></script>

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