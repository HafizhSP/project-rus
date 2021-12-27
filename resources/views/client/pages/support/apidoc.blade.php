@extends('client.layouts.master')

@section('title', 'Dokumentasi API')

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
                Dokumentasi API <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Panduan bagi developer yang ingin menggunakan API kami</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Support</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/support/tips') }}"> Dokumentasi API</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="block block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-book-open"></i> Dokumentasi API</h3>
        </div>
        <div class="block-content my-2">
            <h2 class="text-center">
                Comming Soon...
            </h2>
        </div>
    </div>
</div>

@endsection

@push('script')
@endpush