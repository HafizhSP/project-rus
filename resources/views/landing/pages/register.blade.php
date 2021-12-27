@extends('landing.layouts.master')

@section('title', 'Pendaftaran Reseller')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Hero Section-->
<div class="home">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="hero-content wow fadeIn">
                    <h1>Pendaftaran Reseller Layanan Social Media</h1>
                    <p>Kini anda dapat berjualan followers, likes, komentar, views<br>
                        Untuk berbagai social media seperti Instagram, Twitter, Facebook, dan masih banyak lagi lainnya
                    </p>
                    <a class="btn-action js-scroll-trigger" href="#register">Daftar Sekarang!</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="hero-img wow fadeIn">
                    <img class="img-fluid" src="{{ asset('home/assets/images/home/register.png') }}" alt="Home">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Array Pricing Section -->
<div id="pricing" class="pricing-section text-center" style="background: #f6f6fd;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="pricing-intro wow fadeInDown">
                    <h1>Biaya Pendaftaran</h1>
                    <p>
                        Anda hanya dikenakan biaya 1x untuk registrasi sebagai member resmi. <br class="hidden-xs">Harga bisa berubah sewaktu-waktu. Kuota reseller terbatas!
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-2 col-md-6">
                        <div class="table-left wow fadeInDown">
                            <div class="pricing-details">
                                <h2>Basic</h2>
                                <img src="{{ asset('home/assets/images/icons/free.png') }}" width="60" alt="Icon">
                                <span>Rp. 100.000</span>
                                <ul>
                                    <li>Akses Platform </li>
                                    <li>Sistem Order Otomatis</li>
                                    <li>Sistem Topup Otomatis</li>
                                    <li>Full Support 24/7</li>
                                </ul>
                                <a class="btn-action js-scroll-trigger" href="#register">Daftar Sekarang!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="table-right wow fadeInDown">
                            <div class="pricing-details">
                                <h2>Beginner</h2>
                                <img src="{{ asset('home/assets/images/icons/paid.png') }}" width="60" alt="Icon">
                                <span>Rp. 500.000</span>
                                <ul>
                                    <li>Akses Platform </li>
                                    <li>Sistem Order Otomatis</li>
                                    <li>Sistem Topup Otomatis</li>
                                    <li>Full Support 24/7</li>
                                </ul>
                                <a class="btn-action js-scroll-trigger" href="#register">Daftar Sekarang!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Array Pricing Ends -->

<!-- Features Section -->
<div id="features" class="flex-split">
    <div class="container-s">
        <div class="flex-intro align-center wow fadeIn">
            <h2>Eksklusif SMM Platform</h2>
            <p> When you get staright to the point the presentation looks attractive on your web pages.
                Keep it simple and clean always.</p>
        </div>
        <div class="flex-inner align-center">
            <div class="f-image wow">
                <img style="background: white;" class="img-fluid" src="{{ asset('home/assets/images/feature.png') }}" alt="Feature">
            </div>
            <div class="f-text">
                <div class="left-content">
                    <h2>Dynamic charts.</h2>
                    <p> When you get staright to the point the presentation looks attractive on your web
                        pages.</p>
                    <a href="#">Know more</a>
                </div>
            </div>
        </div>

        <div class="flex-inner flex-inverted align-center">
            <div class="f-image f-image-inverted">
                <img style="background: white;" class="img-fluid" src="{{ asset('home/assets/images/feature.png') }}" alt="Feature">
            </div>
            <div class="f-text">
                <div class="left-content">
                    <h2>Mobile Analytics.</h2>
                    <p> When you get staright to the point the presentation looks attractive on your web
                        pages.</p>
                    <a href="#">Know more</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products -->
<div id="register" class="features wow fadeInDown">
    <div class="container-m">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="features-intro">
                    <h2>Form Pendaftaran SMMReseller</h2>
                    <p>Dengan menjadi reseller kami maka anda bisa menjual kembali berbagai macam produk/layanan kami dengan harga yang jauh lebih murah daripada harga jual</p>
                </div>
            </div>

            <div class="col-md-12">
                <form action="{{ url('/register') }}" method="post">
                    <div class="form-row my-2">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nama</label>
                            <input id="name" type="text" minlength="3" name="name" class="form-control" required placeholder="* Nama">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control" required placeholder="* E-mail Anda">
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-md-6 mb-3">
                            <label for="kontak">Nomor Hp</label>
                            <input id="kontak" type="text" minlength="10" name="kontak" class="form-control" placeholder="* No. HP" aria-required="true" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username">Username Akun</label>
                            <input id="username" type="text" minlength="5" name="username" class="form-control" placeholder="* Username Akun" aria-required="true" required>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-md-6 mb-3">
                            <label for="password">Password Akun</label>
                            <input id="password" data-rule-password="true" minlen="5" type="password" name="password" class="form-control" placeholder="* Password Akun" aria-required="true" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpassword">Konfirmasi Password</label>
                            <input id="cpassword" data-rule-password="true" data-rule-equalTo="#password" minlen="5" type="password" name="cpassword" class="form-control" placeholder="* Konfirmasi Password Akun" aria-required="true" required>
                        </div>
                    </div>
                    <div class='form-group recaptcha-container' align="center">
                        <div style="background:none;border:none;" class='btn g-recaptcha' data-sitekey='6LcsVhoUAAAAAIe1xfwgnrFfFngSpOXXlwd3ssl4' data-callback="correctCaptcha"></div>
                    </div>
                    <button class="btn-action" type="submit">Daftar Sekarang!</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection