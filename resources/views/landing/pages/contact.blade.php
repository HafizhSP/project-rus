@extends('landing.layouts.master')

@section('title', 'Hubungi Kami')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Array Pricing Section -->
<div id="pricing" class="pricing-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="pricing-intro wow fadeInDown">
                    <h1>Punya Pertanyaan? Hubungi Kami Sekarang!</h1>
                    <p>
                        Isi form dibawah ini untuk menghubungi admin SMMReseller. <br class="hidden-xs">Kami akan menghubungi anda melalui E-mail yang anda cantumkan dalam waktu kurang dari 1x24 jam.
                    </p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-8">
                <form class="needs-validation" novalidate>
                    <div class="form-row my-2">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nama</label>
                            <input id="name" type="text" minlen="3" name="name" class="form-control required" required placeholder="* Nama" aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control required email" required placeholder="* E-mail Anda" aria-required="true">
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-md-6 mb-3">
                            <label for="phone">Nomor Hp</label>
                            <input id="phone" minlen="8" type="number" name="phone" class="form-control" required placeholder="* Nomor HP" aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="departement">Masalah</label>
                            <select class="form-control input-sm valid" name="departement" aria-invalid="false">
                                <option value="1">Info Layanan</option>
                                <option value="2">Kerja Sama</option>
                                <option value="3">Konfirmasi Pembayaran</option>
                                <option value="4">Report Error/Bug</option>
                                <option value="5">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-md-12 mb-3">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="message" rows="4" class="form-control message" required placeholder="* Masukkan isi pesan anda disini..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class='form-group recaptcha-container' align="center">
                        <div style="background:none;border:none;" class='btn g-recaptcha' data-sitekey='6LcsVhoUAAAAAIe1xfwgnrFfFngSpOXXlwd3ssl4' data-callback="correctCaptcha"></div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Array Pricing Ends -->

@endsection