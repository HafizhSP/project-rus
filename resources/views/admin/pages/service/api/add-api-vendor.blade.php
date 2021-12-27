@extends('admin.layouts.master')

@section('title', 'API Vendor Baru')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                API Vendor Baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/api/vendor') }}"> API Vendor</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/api/vendor/create') }}"> API Vendor Baru</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->


<div class="content d-flex justify-content-center">
    <!-- Form Sosial Media -->
    <div class="col-8">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-globe-asia"></i> Vendor Baru</h3>
            </div>
            <div class="block-content">

                @if (Request::url() == route('vendor.create'))
                <form class="js-validation" action="{{ route('vendor.store') }}" method="POST" enctype="multipart/form-data">
                    @else
                    <form class="js-validation" action="{{ route('vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name">Nama Vendor <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required value="{{ isset($vendor) ? $vendor->name : old('name')}}">
                                    @error('name')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="url">URL <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" id="url" name="url" placeholder="https://smmreseller.co.id/api" required value="{{ isset($vendor) ? $vendor->url : old('url')}}">
                                    @error('url')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="custom-select" id="status" name="status" required>
                                        <option {{ isset($vendor) ? $vendor->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                        <option {{ isset($vendor) ? $vendor->status == 0 ? 'selected' : '' : '' }} value="0">Non-aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="key">API Key <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="key" name="key" placeholder="API Key Vendor" required value="{{ isset($vendor) ? $vendor->key : old('key')}}">
                                    @error('key')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    <!-- END Form Sosial Media -->
</div>

@endsection

@push('script')
<!-- Page JS Code -->
<script src="{{ asset('panel/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/pages/be_forms_validation.min.js') }}"></script>
@endpush