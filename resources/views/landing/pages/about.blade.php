@extends('landing.layouts.master')

@section('title', 'Tentang SMMReseller')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Features Section -->
<div id="features" class="flex-split">
    <div class="container-s">
        <div class="flex-intro align-center wow fadeIn">
            <h2>Tentang SMMReseller</h2>
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

@endsection