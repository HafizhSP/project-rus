@extends('admin.layouts.master')

@section('title', 'Statistik Pesanan')

@push('style')
@endpush

@section('content')
<!-- Page Content -->
<div class="bg-image" style="background-image: url('{{ asset('panel/assets/media/photos/photo6@2x.jpg') }}');">
    <div class="bg-primary-dark-op">
        <div class="hero bg-black-50">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="row justify-content-center">
                        <div class="col-md-6 py-3 text-center">
                            <div class="push">
                                <a class="link-fx font-w700 font-size-h1" href="index.html">
                                    <span class="text-white">Under Development</span>
                                </a>
                                <p class="text-white-50">Stay tuned! We are working on it and it is coming soon!</p>
                            </div>

                            <a class="btn btn-alt-primary" href="{{ url('/manage') }}">
                                <i class="fa fa-arrow-left mr-1"></i> Go Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection

@push('script')
<script src="{{ asset('panel/assets/js/pages/op_coming_soon.min.js') }}"></script>
@endpush