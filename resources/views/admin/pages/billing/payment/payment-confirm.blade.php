@extends('admin.layouts.master')

@section('title', 'Konfirmasi Pembayaran')

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
                Konfirmasi Pembayaran
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/payment') }}"> Billing</a>
                    </li>
                    <li class="breadcrumb-item">Konfirmasi Pembayaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</h3>
        </div>
        <div class="block-content">

            <!-- List Payment Confirmation Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th class="text-center">Invoice</th>
                            <th>Pengirim</th>
                            <th style="width: 90px; max-width: 100px;">Tujuan</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Bukti</th>
                            <th class="text-center" style="min-width: 70px;">Data</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>
                                <span class="font-w600">{{ $payment->type }}</span>
                            </td>
                            <td class="text-center font-size-sm text-primary">
                                <span class="font-w600">{{ $payment->invoice_id }}</span>
                            </td>
                            <td class="font-size-sm">
                                {{ $payment->sender }}
                            </td>
                            <td class="font-size-sm">
                                [{{ $payment->bank->name }}] - {{ $payment->bank->no_rek }}
                            </td>
                            <td class="text-center font-size-sm">
                                <span class="d-block">Rp. {{number_format($payment->nominal,0,",",".")}}</span>
                                <small class="d-block">{{date('d M Y', strtotime($payment->created_at))}}</small>
                            </td>
                            <td class="text-center font-size-sm">
                                <a href="javascript:void(0);" image="{{ asset("storage/images/payment/confirmation/$payment->proof") }}" invoice="{{ $payment->invoice_id }}" class="show-konfirmasi">Lihat Disini</a>
                            </td>
                            <td class="text-center font-size-sm">
                                <span class="d-block">{{ $payment->data[0] }}</span>
                                <span class="d-block">Rp. {{number_format($payment->data[1],0,",",".")}}</span>
                            </td>
                            <td class="text-center">
                                @if($payment->status == "Pending")
                                <span class="badge badge-warning">Pending</span>
                                @elseif($payment->status == "Confirm")
                                <span class="badge badge-primary">Confirm</span>
                                @elseif($payment->status == "Denied")
                                <span class="badge badge-danger">Denied</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($payment->status == "Pending")
                                <div class="d-inline-flex">
                                    <div class="col-6">
                                        <form action="{{ route('payment-confirm', ['id' => $payment->id]) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="button" class="btn btn-sm btn-primary selectButton">Confirm</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('payment-denied', ['id' => $payment->id]) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="button" class="btn btn-sm btn-danger selectButton">Denied</button>
                                        </form>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-info" disabled>Done</button>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END List Payment Confirmation Table -->
        </div>
    </div>
</div>




<!-- Image Konfirmasi Modal -->
<div class="modal fade" id="image_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Konfirmasi Pembayaran <span id="invoice-konfirmasi"></span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <img class="img-thumbnail p-2" id="img-konfirmasi" src="#">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END Image Konfirmasi Modal -->

@endsection

@push('script')
<!-- Datatables -->
<script src="{{ asset('panel/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/datatables.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/billing/payment.js') }}"></script>

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
            order: []
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