@extends('client.layouts.master')

@section('title', 'Detail Deposit')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/flatpickr/flatpickr.min.css') }}">
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Detail Deposit <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">detail nominal dan pembayaran deposit</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ route('deposit.create') }}"> Deposit</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/deposit/history') }}"> Riwayat</a>
                    </li>
                    <li class="breadcrumb-item">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fab fa-wpforms"></i> <small>Detail Deposit ID <span class="font-w600 text-primary">{{ $deposit->id }}</span></small></h3>
                    <input type="hidden" name="p" value="1" />
                </div>
                <div class="block-content">

                    @if($deposit->status == 1)
                    <div class="form-group text-center">
                        <label>Batas Waktu Pembayaran</label>
                        <h2 class="text-muted">
                            <b>
                                <div class="text-center" id="countdownPayment"></div>
                            </b>
                        </h2>
                    </div>
                    @endif

                    <div class="form-group text-center">
                        <label>Status Pembayaran</label>
                        @if($deposit->status == 1)
                        <div class="alert alert-warning font-w600 text-uppercase">
                            Belum Dibayar
                        </div>
                        @elseif($deposit->status == 2)
                        <div class="alert alert-success font-w600 text-uppercase">
                            Lunas
                        </div>
                        @elseif($deposit->status == 3)
                        <div class="alert alert-danger font-w600 text-uppercase">
                            Dibatalkan
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label>Metode Pembayaran</label>
                                <div class="alert alert-secondary font-w600 p-3">
                                    {{ $deposit->bank->type }} - {{ $deposit->bank->name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label>Saldo Diterima</label>
                                <div class="alert alert-secondary font-w600 p-3">
                                    Rp. {{number_format($deposit->amount,0,",",".")}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label>Biaya Payment Gateway</label>
                                <div class="alert alert-secondary font-w600 p-3">
                                    Rp. {{number_format($deposit->uniq,0,",",".")}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label>Jumlah Ditagihkan</label>
                                <div class="alert alert-secondary font-w700">
                                    Rp. {{number_format($deposit->price,0,",",".")}}
                                    <button type="button" class="btn btn-outline-primary btn-sm ml-2" onclick="copy(50159)" data-toggle="tooltip" data-animation="true" data-placement="top" title="Salin">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pembayaran -->
                    @if($deposit->bank->type == "Bank Transfer" )
                    <div class="form-group text-center">
                        <label>Rekening Pembayaran</label>
                        <div class="alert alert-info font-w700 p-3">
                            <span class="d-block">{{ $deposit->bank->no_rek }}
                                <button type="button" class="btn btn-outline-primary btn-sm ml-2" onclick="copy(5055050550)" data-toggle="tooltip" data-animation="true" data-placement="top" title="Salin">
                                    <i class="far fa-copy"></i>
                                </button>
                            </span>
                            <span class="d-block">A/N : {{ $deposit->bank->an }}</span>
                        </div>
                    </div>
                    @elseif($deposit->bank->type == "Virtual Account")
                    <div class="form-group text-center">
                        <label>Kode Virtual Account BCA</label>
                        <div class="alert alert-info font-w700 p-3">
                            5055050550
                            <button type="button" class="btn btn-outline-primary btn-sm ml-2" onclick="copy(5055050550)" data-toggle="tooltip" data-animation="true" data-placement="top" title="Salin">
                                <i class="far fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    @elseif($deposit->bank->type == "E-Wallets")
                    <div class="form-group alert alert-info p-3">
                        <div class="text-center font-w700 ">
                            <p>Masukkan Nomor OVO anda :</p>
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-12">
                                    <input type="number" minlength="10" maxlength="13" class="form-control" id="number-ovo" placeholder="(format : 085123456123)">
                                    <input type="hidden" id="uplink" value="123">
                                </div>
                            </div>
                            <div class="text-center mt-2" id="loading_ovo_submit" style="display: none;">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success my-3" id="submit-ovo" data-id="1">Submit</button>
                        </div>
                        <small class="d-block mb-1 font-italic">*Terdapat fee payment gateway untuk metode pembayaran <b>E-Wallet OVO</b> ini adalah sebesar <b>1.7%</b> dari total deposit.</small>
                        <small class="d-block mb-1 font-italic">*Pastikan nomor anda adalah <b>nomor yang aktif pada aplikasi OVO</b>.</small>
                        <small class="d-block mb-1 font-italic">*Notification Pembayaran OVO akan muncul pada device anda dan hanya berlaku selama <b>30 Detik setelah Submit</b>.</small>
                    </div>
                    <div class="form-group alert alert-info p-3">
                        <div class="text-center font-w700 ">
                            <div class="form-group d-none d-sm-none d-md-block">
                                <!-- Desktop Version -->
                                <p>Tombol Pembayaran :</p>
                                <a href="#" target="_blank" class="btn btn-success btn-sm">Bayar Sekarang!</a>
                            </div>
                            <div class="form-group d-sm-block d-md-none">
                                <!-- Mobile Version -->
                                <p>Tombol Pembayaran :</p>
                                <a href="#" target="_blank" class="btn btn-success btn-sm">Bayar Sekarang!</a>
                            </div>
                        </div>
                        <small class="d-block mb-1 font-italic">*Terdapat fee payment gateway untuk metode pembayaran <b>E-Wallet DANA</b> ini adalah sebesar <b>1.7%</b> dari total deposit.</small>
                        <small class="d-block mb-1 font-italic">*Pastikan nomor anda adalah <b>nomor yang aktif pada aplikasi DANA</b>.</small>
                        <small class="d-block mb-1 font-italic">*Link Pembayaran DANA berlaku selama <b>30 Menit setelah Submit</b>.</small>
                    </div>
                    <div class="form-group alert alert-info p-3">
                        <div class="text-center font-w700 ">
                            <div class="form-group d-none d-sm-none d-md-block">
                                <!-- Desktop Version -->
                                <p>Tombol Pembayaran :</p>
                                <a href="#" target="_blank" class="btn btn-success btn-sm">Bayar Sekarang!</a>
                            </div>
                            <div class="form-group d-sm-block d-md-none">
                                <!-- Mobile Version -->
                                <p>Tombol Pembayaran :</p>
                                <a href="#" target="_blank" class="btn btn-success btn-sm">Bayar Sekarang!</a>
                            </div>
                        </div>
                        <small class="d-block mb-1 font-italic">*Terdapat fee payment gateway untuk metode pembayaran <b>E-Wallet LINKAJA</b> ini adalah sebesar <b>1.7%</b> dari total deposit.</small>
                        <small class="d-block mb-1 font-italic">*Pastikan nomor anda adalah <b>nomor yang aktif pada aplikasi LINKAJA</b>.</small>
                        <small class="d-block mb-1 font-italic">*Link Pembayaran LINKAJA berlaku selama <b>5 Menit setelah Submit</b>.</small>
                        <small class="d-block mb-1 font-italic">*Segera lakukan pembayaran setelah klik tombol <b>Bayar Sekarang!</b>.</small>
                    </div>
                    @endif
                    <!-- END Pembayaran -->


                    @if(isset($detailKonfirmasi))
                    @if($detailKonfirmasi->status == "Pending")
                    <div class="form-group text-center mb-5">
                        <div class="form-group text-center">
                            <label>Status Konfirmasi</label>
                            <div>
                                <button class="alert alert-secondary">Menunggu Konfirmasi</button>
                            </div>
                            <a href="javascript:void(0);" id="show-konfirmasi" class="font-italic">Lihat Bukti Transfer</a>
                        </div>
                    </div>
                    @elseif($detailKonfirmasi->status == "Denied")
                    <div class="form-group text-center">
                        <label class="font-size-sm">Sudah melakukan pembayaran namun tidak terdeteksi?</label>
                        <div>
                            <button type="button" id="konfirmasi_button" data-invoice="{{ $deposit->id }}" class="btn btn-primary btn-lg">Konfirmasi Manual</button>
                        </div>
                        <small class="text-muted font-italic">Konfirmasi hanya bisa dikirim 1x</small>
                    </div>
                    @endif
                    @elseif ($konfirmasi)
                    <div class="form-group text-center">
                        <label class="font-size-sm">Sudah melakukan pembayaran namun tidak terdeteksi?</label>
                        <div>
                            <button type="button" id="konfirmasi_button" data-invoice="{{ $deposit->id }}" class="btn btn-primary btn-lg">Konfirmasi Manual</button>
                        </div>
                        <small class="text-muted font-italic">Konfirmasi hanya bisa dikirim 1x</small>
                    </div>
                    @endif


                    <!-- if status BELUM DIBAYAR -->
                    @if($deposit->status == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <h6 style="text-align:center;">Mohon baca dengan seksama catatan pembayaran
                                dibawah ini untuk memudahkan transaksi anda.</h6>
                            <hr>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <span>
                                <strong>1. Transfer Dalam 12 Jam.</strong><br>Transfer sebelum 12 jam
                                agar proses topup/deposit tidak dibatalkan otomatis. Proses verifikasi
                                pembayaran dilakukan otomatis<br><br>
                                <strong>2. Transfer Tepat.</strong><br>Transfer tepat dengan jumlah
                                <b>Rp. 50.851</b>
                                agar pembayaran terdeteksi otomatis dan tidak ada lagi verifikasi
                                manual oleh admin.<br><br>
                            </span>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <span>
                                <strong>3. Setelah Melakukan Pembayaran.</strong><br>
                                Tunggu 5-30 menit sistem akan melakukan pengecekan pembayaran anda
                                secara otomatis.<br><br>
                                <strong>4. Jika Saldo Belum Masuk.</strong><br>
                                Kesalahan nominal transfer dapat menyebabkan (membayar topup orang
                                lain) dan membutuhkan waktu kurang lebih 1 hari untuk melakukan
                                pengecekan transaksi. Lakukan konfirmasi pembayaran jika lebih dari 2
                                jam topup tidak terverifikasi otomatis.<br><br>
                            </span>
                        </div>
                        <div class="col-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <form action="{{ route('deposit-check', ['id' => $deposit->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-block">Cek Pembayaran</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <form action="{{ route('deposit-cancel', ['id' => $deposit->id]) }}" method="post" id="cancel-form">
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-block js-swal-confirm">Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- END if status BELUM DIBAYAR -->

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Konfirmasi Manual -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Konfirmasi Pembayaran</span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>

                <form action="" id="formKonfirmasi" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Invoice Topup</label>
                                    <input type="text" class="form-control" id="invoice_show" required="true" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="konfirmasi_pembayaran">No. Rekening - Bank Pengirim</label>
                                    <input class="form-control" minlen="6" id="konfirmasi_pembayaran" name="konfirmasi_pembayaran" placeholder="066601008779502 - BRI" required="required" autofocus value="{{ old('konfirmasi_pembayaran') }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Rekening</label>
                                    <input type="text" minlen="3" class="form-control" id="name" name="name" placeholder="Nama Pengirim" required="required" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="date">Tgl. Pembayaran</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="date" name="date" placeholder="YYYY-MM-DD H:M:S" minlen="6" data-enable-time="true" data-time_24hr="true" required="required" value="{{ old('date') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Jumlah Transfer</label>
                                    <input class="form-control" min="20000" id="amount" name="amount" placeholder="50000" type="number" required="required" value="{{ old('amount') }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bukti Pembayaran</label>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="bukti" name="bukti" data-preview-file-type="text" required>
                                        <label class="custom-file-label" for="bukti"></label>
                                    </div>
                                    <small class="text-muted font-italic"><b>*Max 1Mb | Allowed type .jpg, .jpeg, .png</b></small><br>
                                    <small class="text-muted font-italic"><b>Masukkan bukti pembayaran agar proses konfirmasi bisa lebih cepat</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-primary js-swal-confirm">Konfirmasi</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- END Konfirmasi Manual -->


@if(isset($detailKonfirmasi))
<!-- Image Konfirmasi Manual -->
<div class="modal fade" id="image_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Konfirmasi Pembayaran</span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <img class="img-thumbnail p-2" src="{{ asset("storage/images/payment/confirmation/$detailKonfirmasi->proof") }}" alt="{{ $detailKonfirmasi->proof }}">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END Image Konfirmasi Manual -->
@endif


@endsection


@push('script')
<script src="{{ asset('panel/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/client/deposit/deposit-detail.js') }}"></script>

<script>
    // Declarate Global Variable - Show Countdown Payment Expired Time
    var countDownDate = new Date(<?= $expired_payment; ?>).getTime();
    var countdownTimer = setInterval(timer, 1000);
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