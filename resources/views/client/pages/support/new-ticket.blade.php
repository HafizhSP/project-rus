@extends('client.layouts.master')

@section('title', 'Buat Tiket Baru')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Tiket Bantuan <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Butuh bantuan terkait transaksi maupun pesanan anda? Hubungi Kami Sekarang!</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Support</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/support/tickets') }}"> Ticket Bantuan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Submit New Tiket -->
<div class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fab fa-wpforms"></i> <small>Formulir Bantuan Tiket</small></h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/') }}" method="post">
                        <div class="alert alert-warning"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Oke</div>
                        <div id="p_subject" class="form-group">
                            <label for="subject">Judul (disertai no.trx)</label>
                            <select class="custom-select" id="subject" name="subject" required="required" autofocus>
                                <option value="" hidden selected>Pilih Subject/Judul :</option>
                                <option value="ORDER">ORDER</option>
                                <option value="REFILL">REFILL</option>
                                <option value="DEPOSIT">DEPOSIT</option>
                                <option value="OTHER">OTHER</option>
                            </select>
                        </div>
                        <div id="p_message" class="form-group">
                            <label for="message">Detail permasalahan</label>
                            <textarea class="form-control" rows="6" minlen="3" id="message" name="message" placeholder="Ex : ID Pesanan 123 - Tolong direfill karena down.Terimakasih" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" accept="image/*" id="img" name="userfile" data-preview-file-type="text">
                                <label class="custom-file-label" for="img"></label>
                                <small class="text-muted"><i>*Max 2Mb | Max 1920x1080 | Allowed type .jpg, .jpeg, .png</i></small>
                            </div>
                        </div>

                        <div class='form-group text-center' align="center">
                            <div style="background:none;border:none;" class='btn g-recaptcha' data-sitekey='6Lek2kIUAAAAANk111GisJHVNjtGcqLAqtxSRFeg'></div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Submit New Tiket -->
@endsection

@push('script')
@endpush