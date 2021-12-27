@extends('admin.layouts.master')

@section('title', 'Sosmed Baru')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Sosmed baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/product/socmed') }}"> List Sosial Media</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/product/socmed/create') }}"> Sosmed Baru</a>
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
                <h3 class="block-title"><i class="fa fa-list"></i> Sosmed Baru</h3>
            </div>
            <div class="block-content">

                @if (Request::url() == route('socmed.create'))
                <form class="js-validation" action="{{ route('socmed.store') }}" method="POST" enctype="multipart/form-data">
                    @else
                    <form class="js-validation" action="{{ route('socmed.update', $socmed->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama Sosial Media <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required value="{{ isset($socmed) ? $socmed->name : old('name')}}">
                                    @error('name')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="custom-select" id="status" name="status" required>
                                        <option {{ isset($socmed) ? $socmed->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                        <option {{ isset($socmed) ? $socmed->status == 0 ? 'selected' : '' : '' }} value="0">Non-aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Thumbnail Social Media</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="thumbnail" name="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                                @if(isset($socmed->thumbnail))
                                <small><i>Current image : <a href="{{ asset("storage/images/socmed/$socmed->thumbnail") }}" target="_blank">Image</a> </i></small>
                                @endif
                                @error('thumbnail')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
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