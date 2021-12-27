@extends('client.layouts.master')

@section('title', 'Deposit Baru')

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
                Deposit Baru <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"> deposit saldo
                    secara mudah, otomatis & real time!</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ route('deposit.create') }}"> Deposit</a>
                    </li>
                    <li class="breadcrumb-item">Deposit Otomatis</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->


<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Berhubung anda menggunakan akun <b>DEMO</b>, anda tidak bisa menggunakan fitur ini</div>
        </div>
        <div class="col-sm-7">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fab fa-wpforms"></i> <small>Formulir Topup Saldo</small></h3>
                </div>
                <div class="block-content">

                    <form class="js-validation" action=" {{ route('deposit.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Mohon jangan melakukan pembayaran sebelum masuk langkah selanjutnya.</div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="payment">Metode Pembayaran</label>
                                    <select autofocus="true" required id="payment" name="payment" class="form-control">
                                        <option value="">Pilih Metode Pembayaran</option>
                                        @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->type }} - {{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('payment')
                                    <div class="alert alert-soft-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Nominal Topup</label>
                                    <input id="amount" name="amount" class="form-control" type="number" placeholder="0" min="1" required disabled>
                                    @error('amount')
                                    <div class="alert alert-soft-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount_total">Saldo Diterima</label>
                                    <span class="form-control" id="amount_total" disabled>0</span>
                                </div>
                            </div>
                            <div class="col-md-12" id="select_nominal" style="display: none;">
                                <div class="form-group d-flex justify-content-center flex-wrap">
                                    <div class="text-center text-muted font-w600 mx-2">
                                        <a class="item item-rounded shadow bg-warning" onclick="nominal(50000)" href="javascript:void(0)">
                                            <i class="fa fa-coins fa-2x text-white"></i>
                                        </a>
                                        <small>Rp50.000</small>
                                    </div>
                                    <div class="text-center text-muted font-w600 mx-2">
                                        <a class="item item-rounded shadow bg-info" onclick="nominal(250000)" href="javascript:void(0)">
                                            <i class="fa fa-money-bill-wave-alt fa-2x text-white"></i>
                                        </a>
                                        <small>Rp250.000</small>
                                    </div>
                                    <div class="text-center text-muted font-w600 mx-2">
                                        <a class="item item-rounded shadow bg-danger" onclick="nominal(500000)" href="javascript:void(0)">
                                            <i class="fa fa-money-bill-wave fa-2x text-white"></i>
                                        </a>
                                        <small>Rp500.000</small>
                                    </div>
                                    <div class="text-center text-muted font-w600 mx-2">
                                        <a class="item item-rounded shadow bg-success" onclick="nominal(1000000)" href="javascript:void(0)">
                                            <i class="fa fa-money-bill-alt fa-2x text-white"></i>
                                        </a>
                                        <small>Rp1.000.000</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Captcha -->
                            <div class="form-group col-md-12">
                                <div class="d-flex justify-content-center">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                                @error('g-recaptcha-response')
                                <div class="d-flex justify-content-center">
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <!-- END Captcha -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-info-circle"></i> <small>Panduan Deposit Otomatis</small></h3>
                </div>
                <div class="block-content">
                    <h5><i class="fa fa-book"></i> Panduan</h5>
                    <ul>
                        <li>Kata "High Quality" & "Low Quality" menunjukkan kualitas dari layanan tersebut.</li>
                        <li>Masukkan data sesuai yang diminta, jika username masukkan hanya username.<br>
                            Juga ketika diminta memasukkan link lengkap.</li>
                        <li>Anda dapat melacak status pesanan di menu "Riwayat Pemesanan".</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="{{ asset('panel/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/pages/be_forms_validation.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/client/deposit/new-deposit.js') }}"></script>

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