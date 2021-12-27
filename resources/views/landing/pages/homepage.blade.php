@extends('landing.layouts.master')

@section('title', 'SMM Reseller Panel Indonesia')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Hero Section-->
<div class="home">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="hero-img wow fadeIn">
                    <img class="img-fluid" src="{{ asset('home/assets/images/big.png') }}" alt="Home">
                </div>
            </div>
            <div class="col-md-12">
                <div class="hero-content wow fadeIn">
                    <h1><span class="highlight">SMM</span> Reseller Panel Indonesia</h1>
                    <p>Pusat penjualan layanan social media marketing di Indonesia<br>
                        Bergabunglah bersama dengan ratusan reseller yang telah sukses di bisnis social media marketing!</p>
                    <a class="btn-action js-scroll-trigger" href="{{ url('pendaftaran_reseller') }}">Daftar Sekarang!</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="client-list wow fadeIn">
                    <ul>
                        <li><img class="img-fluid" src="{{ asset('home/assets/icons/1.png') }}" alt="Client"> </li>
                        <li><img class="img-fluid" src="{{ asset('home/assets/icons/2.png') }}" alt="Client"> </li>
                        <li><img class="img-fluid" src="{{ asset('home/assets/icons/3.png') }}" alt="Client"> </li>
                        <li><img class="img-fluid" src="{{ asset('home/assets/icons/4.png') }}" alt="Client"> </li>
                        <li><img class="img-fluid" src="{{ asset('home/assets/icons/5.png') }}" alt="Client"> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Products -->
<div id="products" class="features wow fadeInDown">
    <div class="container-m">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="features-intro">
                    <h2>Kenapa harus SMMReseller?</h2>
                    <p>Kami menawarkan berbagai keuntungan untuk anda pertama dan satu-satunya di Indonesia</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-list">
                    <div class="card-icon">
                        <div class="card-img">
                            <img src="{{ asset('home/assets/icons/a1.png') }}" width="35" alt="Feature">
                        </div>
                    </div>
                    <div class="card-text">
                        <h3>Quality #1</h3>
                        <p>Deliver the best stories and ideas on the topics you care about most straight to
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-list">
                    <div class="card-icon">
                        <div class="card-img">
                            <img src="{{ asset('home/assets/icons/a2.png') }}" width="35" alt="Feature">
                        </div>
                    </div>
                    <div class="card-text">
                        <h3>Deposit Otomatis</h3>
                        <p>Deliver the best stories and ideas on the topics you care about most straight to
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-list">
                    <div class="card-icon">
                        <div class="card-img">
                            <img src="{{ asset('home/assets/icons/a3.png') }}" width="35" alt="Feature">
                        </div>
                    </div>
                    <div class="card-text">
                        <h3>Transaksi Aman & Ter-enkripsi</h3>
                        <p>Deliver the best stories and ideas on the topics you care about most straight to
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-list">
                    <div class="card-icon">
                        <div class="card-img">
                            <img src="{{ asset('home/assets/icons/a4.png') }}" width="35" alt="Feature">
                        </div>
                    </div>
                    <div class="card-text">
                        <h3>Full Support</h3>
                        <p>Deliver the best stories and ideas on the topics you care about most straight to
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-list">
                    <div class="card-icon">
                        <div class="card-img">
                            <img src="{{ asset('home/assets/icons/a5.png') }}" width="35" alt="Feature">
                        </div>
                    </div>
                    <div class="card-text">
                        <h3>Proses Otomatis</h3>
                        <p>Deliver the best stories and ideas on the topics you care about most straight to
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-list">
                    <div class="card-icon">
                        <div class="card-img">
                            <img src="{{ asset('home/assets/icons/a6.png') }}" width="35" alt="Feature">
                        </div>
                    </div>
                    <div class="card-text">
                        <h3>Fitur Berlimpah Lainnya</h3>
                        <p>Deliver the best stories and ideas on the topics you care about most straight to
                            you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div id="features" class="flex-split">
    <div class="container-s">
        <div class="flex-intro align-center wow fadeIn">
            <h2>Build better landing pages</h2>
            <p> When you get staright to the point the presentation looks attractive on your web pages.
                Keep it simple and clean always.</p>
        </div>
        <div class="flex-inner align-center">
            <div class="f-image wow">
                <img class="img-fluid" src="{{ asset('home/assets/images/feature.png') }}" alt="Feature">
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
                <img class="img-fluid" src="{{ asset('home/assets/images/feature.png') }}" alt="Feature">
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

<!-- Counter Section -->
<div class="yd-stats wow fadeIn">
    <div class="container-s">
        <div class="row text-center">
            <div class="col-sm-12">
                <div class="intro">
                    <h2>Boost your revenue & cut work hours</h2>
                    <p>Organized workflow and predictive patterns to boost your revenue.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="counter-up">
                    <h3><span class="counter">47</span>%</h3>
                    <div class="counter-text">
                        <h2>Lesser backlogs</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="counter-up">
                    <h3><span class="counter">33</span>%</h3>
                    <div class="counter-text">
                        <h2>Higher Profits</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="counter-up">
                    <h3><span class="counter">33</span>%</h3>
                    <div class="counter-text">
                        <h2>Higher Profits</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="yd-link">
                    <a href="#">Know more about the template</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section Ends -->


<!-- CTA Signup Section -->
<div id="signup" class="cta-sm">
    <div class="container-m text-center">
        <div class="cta-content">
            <h4>GRAB ARRAY FOR BEST PRICE TODAY</h4>
            <h1>Start now and turn your online business into a profitable route.</h1>
            <div class="form wow fadeIn" data-wow-delay="0.2s">
                <form id="chimp-form" class="subscribe-form wow zoomIn" action="http://ydirection.com/Array/assets/php/subscribe.php" method="post" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
                    <input class="mail" id="chimp-email" type="email" name="email" placeholder="Enter your email address" autocomplete="off">
                    <input class="submit-button" type="submit" value="Sign up now">
                </form>
                <div id="response"></div>
            </div>
            <div class="form-note">
                <p>14-day free trial and no credit card required.</p>
            </div>
        </div>
    </div>
</div>



<div class="ar-ft-single wow fadeIn">
    <div class="container-m">
        <div class="ar-feature">
            <div class="ar-list">
                <ul>
                    <li>
                        <div class="ar-icon">
                            <img src="{{ asset('home/assets/icons/f1.png') }}" width="30" alt="Icon">
                        </div>
                        <div class="ar-text">
                            <h3>Client Support</h3>
                            <p>Team hangouts and instant text messaging right from the dashboard.</p>
                        </div>
                    </li>
                    <li>
                        <div class="ar-icon">
                            <img src="{{ asset('home/assets/icons/f4.png') }}" width="30" alt="Icon">
                        </div>
                        <div class="ar-text">
                            <h3>Secure Servers</h3>
                            <p>Team hangouts and instant text messaging right from the dashboard.</p>
                        </div>
                    </li>
                    <li>
                        <div class="ar-icon">
                            <img src="{{ asset('home/assets/icons/f11.png') }}" width="30" alt="Icon">
                        </div>
                        <div class="ar-text">
                            <h3>Product Feedback</h3>
                            <p>Team hangouts and instant text messaging right from the dashboard.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ar-image">
                <img class="ar-img img-fluid" src="{{ asset('home/assets/images/feature-2.png') }}" alt="Hero Image">
            </div>
        </div>
    </div>
</div>


<div id="reviews" class="yd-reviews">
    <!-- Array Reviews -->
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <div class="intro wow fadeIn" data-wow-delay="0.1s">
                    <h1>Customers say nice things</h1>
                    <p>We have very fair pricing policy that would benefit you and us at the same time.
                        Get the free plan &amp; if you need more - pay.
                    </p>
                </div>
            </div>

            <div class="col-sm-12 col-lg-8 offset-lg-2 text-center">
                <div class="review-cards owl-carousel owl-theme wow fadeInDown" data-wow-delay="0.2s">
                    <div class="card-single">
                        <div class="review-text">
                            <h1>"We have very fair pricing policy that would benefit you and us at the same
                                time.
                                Choose what price you're willing to pay. Get the free plan & if you need
                                more - pay."
                            </h1>
                        </div>
                        <div class="review-attribution">
                            <div class="review-img">
                                <img class="img-fluid rounded-circle" src="{{ asset('home/assets/icons/review-1.png') }}" alt="Review">
                            </div>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-ios-star-half"></i>
                            <h2> Albert Rossi</h2>
                            <h6>Stack Developer</h6>
                            <a href="#">Dropboxes Inc</a>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="review-text">
                            <h1>"We have very fair pricing policy that would benefit you and us at the same
                                time.
                                Choose what price you're willing to pay. Get the free plan & if you need
                                more - pay."
                            </h1>
                        </div>
                        <div class="review-attribution">
                            <div class="review-img">
                                <img class="img-fluid rounded-circle" src="{{ asset('home/assets/icons/review-2.png') }}" alt="Review">
                            </div>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-ios-star-half"></i>
                            <h2> Melissa Vanbergh</h2>
                            <h6>Vice President</h6>
                            <a href="#">Vestor Corp</a>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="review-text">
                            <h1>"We have very fair pricing policy that would benefit you and us at the same
                                time.
                                Choose what price you're willing to pay. Get the free plan & if you need
                                more - pay."
                            </h1>
                        </div>
                        <div class="review-attribution">
                            <div class="review-img">
                                <img class="img-fluid rounded-circle" src="{{ asset('home/assets/icons/review-3.png') }}" alt="Review">
                            </div>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <i class="ion ion-star"></i>
                            <h2> Joshua Peterson</h2>
                            <h6>Product Developer</h6>
                            <a href="#">Betabet Inc</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Array Reviews Ends -->


@endsection