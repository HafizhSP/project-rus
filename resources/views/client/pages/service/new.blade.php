@extends('client.layouts.master')

@section('title', 'Pesanan Baru')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
<link rel="stylesheet" href="{{ asset('panel/assets/custom/client/order/new-order.css') }}">
@endpush

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Buat Pesanan <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Formulir pemesanan layanan khusus untuk reseller</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/service/order') }}"> Pesanan Baru</a>
                    </li>
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
        <div class="col-sm-6">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-luggage-cart"></i><small> Formulir Pemesanan Layanan</small></h3>
                </div>
                <div class="block-content">

                    <form class="js-validation" action="{{ route('order.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label>Social Media</label>
                                    <div class="controls d-flex justify-content-center flex-wrap">

                                        @foreach ($socmeds as $socmed)
                                        <div class="pilih-sosmed">
                                            <input type="radio" name="socmed" id="socmed_{{ $socmed->id }}" value="{{ $socmed->id }}">
                                            <label class="label-sosmed" for="socmed_{{ $socmed->id }}">
                                                <img src="{{ asset("storage/images/socmed/$socmed->thumbnail")}}" height="60" width="60">
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pilih-category">Kategori</label>
                                    <select id="pilih-category" name="category" class="form-control" required disabled>
                                        <option value="0">Harap terlebih dahulu pilih sosmed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pilih-product">Produk</label>
                                    <select id="pilih-product" name="product" class="form-control" required disabled>
                                        <option value="0">Harap terlebih dahulu pilih kategori</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">Harga/1K</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" id="price" placeholder="0" name="price" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="min">Min</label>
                                    <input type="number" class="form-control" id="min" placeholder="0" name="min" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="max">Max</label>
                                    <input type="text" class="form-control" id="max" placeholder="0" name="max" readonly>
                                </div>
                            </div>

                            <div class="col-sm-12" id="keterangan_area" style="display: none;">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Tambahan</label>
                                    <textarea class="form-control" id="keterangan" cols="30" rows="5" readonly></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12" id="target_area">
                                <div class="form-group">
                                    <label for="target">URL/Link</label>
                                    <input id="target" name="target" minlen="2" class="form-control" type="text" required disabled>
                                    <p class="text-danger"><small><b>*Pastikan akun benar dan dapat diakses publik (atau tidak ada refund)</b></small></p>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display: none;" id="komentar_area">
                                <div class="form-group">
                                    <label>List Komentar</label>
                                    <textarea name="komentar" id="komentar" class="form-control" rows="6" placeholder="masukkan list komentar per baris 1"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="amount">Jumlah</label>
                                    <input id="amount" name="amount" class="form-control" placeholder="100" type="number" required disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="total_price">Total Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" id="total_price" value="0" disabled readonly></input>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-sm-12" id="p_coupon_code" style="display: none;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Kode Kupon">
                                        <div class="input-group-append">
                                            <button id="p_check" type="button" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-sm-12">
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
        <div class="col-sm-6">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-info-circle"></i> <small>Ketentuan Pemesanan Layanan</small></h3>
                </div>
                <div class="block-content">
                    <div class="alert alert-success"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Harap baca terlebih dahulu sebelum melakukan order di smmreseller</div>
                    <h5><i class="fa fa-cogs"></i> Ketentuan</h5>
                    <ul>
                        <li>Dengan melakukan pemesanan layanan di smmreseller, berarti anda telah menyetujui semua peraturan yang ada. walaupun anda belum membacanya.</li>
                        <li>Pesananan tidak bisa dibatalkan, sistem akan otomatis memproses pembatalan apabila data/link yang anda masukkan tidak ditemukan.</li>
                        <li>Pastikan anda telah memeriksa pesanan anda (tidak diprivate dan tersedia) sebelum klik tombol "submit".</li>
                        <li>Kesalahan submit dapat mengakibatkan kerugian dan tidak bisa dibatalkan.</li>
                    </ul>
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
<script src="{{ asset('panel/assets/custom/client/order/new-order.js') }}"></script>


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