@extends('admin.layouts.master')

@section('title', 'Produk Baru')

@push('custom-style')
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Produk Baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/product') }}"> List Produk</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/product/create') }}"> Produk Baru</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->


<div class="content">
    <!-- Form Sosial Media -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-list"></i> Produk Baru</h3>
        </div>
        <div class="block-content">

            @if (Request::url() == route('list.create'))
            <form class="js-validation" action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data">
                @else
                <form class="js-validation" action="{{ route('list.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Nama Produk <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required value="{{ isset($product) ? $product->name : old('name')}}">
                                @error('name')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="category">Jenis Kategori <span class="text-danger">*</span></label>
                                <select class="js-select2 form-control" id="category" name="category" style="width: 100%;" data-placeholder="Pilih Kategori Produk..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($categories as $category)
                                    <option {{ isset($product) ? ($product->service_category_id == $category->id ? 'selected' : '') : (old('category')== $category->id ? 'selected' : '') }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select class="custom-select" id="status" name="status" required>
                                    <option {{ isset($product) ? $product->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                    <option {{ isset($product) ? $product->status == 0 ? 'selected' : '' : '' }} value="0">Non-aktif</option>
                                </select>
                                @error('status')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="vendor">Vendor<span class="text-danger">*</span></label>
                                <select class="custom-select" id="vendor" name="vendor" required>
                                    <option value="">Pilih Server Vendor</option>
                                    @foreach ($vendors as $vendor)
                                    <option {{ isset($product) ? ($product->api_vendor_id == $vendor->id ? 'selected' : '') : (old('vendor')== $vendor->id ? 'selected' : '') }} value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="api_id">API-ID <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" id="api_id" name="api_id" placeholder="5" required value="{{ isset($product) ? $product->api_id : old('api_id')}}">
                                @error('api_id')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="min">Min Order <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" id="min" name="min" placeholder="5" required value="{{ isset($product) ? $product->min : old('min')}}">
                                @error('min')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="max">Max Order <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" id="max" name="max" placeholder="5" required value="{{ isset($product) ? $product->max : old('max')}}">
                                @error('max')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="column_status">Kolom Tambahan <span class="text-danger">*</span></label>
                                <select class="custom-select" id="column_status" name="column_status" required>
                                    <option {{ isset($product) ? $product->column_status == 0 ? 'selected' : '' : '' }} value="0">Tidak</option>
                                    <option {{ isset($product) ? $product->column_status == 1 ? 'selected' : '' : '' }} value="1">Ya</option>
                                </select>
                                @error('column_status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="hbeli">Harga Beli /1K <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rp.
                                        </span>
                                    </div>
                                    <input type="number" min="0" class="form-control" id="hbeli" name="hbeli" placeholder="11000" required value="{{ isset($product) ? $product->hbeli : old('hbeli')}}">
                                </div>
                                @error('hbeli')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="margin">Margin <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" min="0" class="form-control" id="margin" name="margin" placeholder="10" value="{{ isset($product) ? $product->margin : old('margin')}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text input-group-text-alt">
                                            %
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="hjual">Harga Jual /1K <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rp.
                                        </span>
                                    </div>
                                    <input type="number" min="0" class="form-control" id="hjual" name="hjual" placeholder="22000" required value="{{ isset($product) ? $product->hjual : old('hjual')}}">
                                </div>
                                @error('hjual')
                                <div class=" alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="desc">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="desc" name="desc" required rows="2" placeholder="Deskripsi Layanan" aria-invalid="true">{{ isset($product) ? $product->desc : old('desc')}}</textarea>
                                @error('desc')
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
    <!-- END Form Sosial Media -->
</div>

@endsection

@push('script')
<!-- Page JS Code -->
<script src="{{ asset('panel/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/service/product.js') }}"></script>
<script>
    jQuery(function() {
        One.helpers('select2');
    });
</script>
@endpush