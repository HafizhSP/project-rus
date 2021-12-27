@extends('admin.layouts.master')

@section('title', 'Kategori Baru')

@push('custom-style')
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Kategori Baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/product/category') }}"> List Kategori</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/product/category/create') }}"> Kategori Baru</a>
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
                <h3 class="block-title"><i class="fa fa-list"></i> Kategori Baru</h3>
            </div>
            <div class="block-content">

                @if (Request::url() == route('category.create'))
                <form class="js-validation" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @else
                    <form class="js-validation" action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama Kategori <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required value="{{ isset($category) ? $category->name : old('name')}}">
                                    @error('name')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="socmed">Jenis Sosial Media <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-control" id="socmed" name="socmed" required style="width: 100%;" data-placeholder="Pilih Social Media..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach ($socmeds as $socmed)
                                        <option {{ isset($category) ? ($category->service_socmed_id == $socmed->id ? 'selected' : '') : (old('socmed') == $socmed->id ? 'selected' : '') }} value="{{ $socmed->id }}">{{ $socmed->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="custom-select" id="status" name="status" required>
                                <option {{ isset($category) ? $category->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                <option {{ isset($category) ? $category->status == 0 ? 'selected' : '' : '' }} value="0">Non-aktif</option>
                            </select>
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
<script src="{{ asset('panel/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    jQuery(function() {
        One.helpers('select2');
    });
</script>
@endpush