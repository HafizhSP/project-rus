@extends('admin.layouts.master')

@section('title', 'Bank Baru')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Bank Baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/bank') }}"> List Bank</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/bank/create') }}"> Bank Baru</a>
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
                <h3 class="block-title"><i class="fa fa-piggy-bank"></i> Bank Baru</h3>
            </div>
            <div class="block-content">

                @if (Request::url() == route('bank.create'))
                <form class="js-validation" action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
                    @else
                    <form class="js-validation" action="{{ route('bank.update', $bank->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type">Jenis <span class="text-danger">*</span></label>
                                    <select class="custom-select" id="type" name="type" required>
                                        <option {{ isset($bank) ? $bank->type == "Bank Transfer" ? 'selected' : '' : '' }} value="Bank Transfer">Bank Transfer</option>
                                        <option {{ isset($bank) ? $bank->type == "Virtual Account" ? 'selected' : '' : '' }} value="Virtual Account">Virtual Account</option>
                                        <option {{ isset($bank) ? $bank->type == "E-Wallets" ? 'selected' : '' : '' }} value="E-Wallets">E-Wallets</option>
                                    </select>
                                    @error('type')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama Bank <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="BCA/MANDIRI/BNI" required value="{{ isset($bank) ? $bank->name : old('name')}}">
                                    @error('name')
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
                                    <label for="slug">Slug Bank <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="*Singkatan (ex:bca)" required value="{{ isset($bank) ? $bank->slug : old('slug')}}">
                                    @error('slug')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="atasnama">Atas Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="atasnama" name="atasnama" placeholder="A/N" required value="{{ isset($bank) ? $bank->an : old('an')}}">
                                    @error('atasnama')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="no_rek">Nomor Rekening <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="12345678" required value="{{ isset($bank) ? $bank->no_rek : old('no_rek')}}">
                                    @error('no_rek')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="{{ isset($bank) ? $bank->username : old('username')}}">
                                    @error('username')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" {{ isset($bank) ? '' : 'required' }}>
                                    @if(isset($bank))
                                    <small class="text-muted font-italic">*Kosongi jika tidak ingin mengganti</small>
                                    @endif
                                    @error('password')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="linkapi">Link API Bank <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" id="linkapi" name="linkapi" placeholder="Link I-bank bank yang bersangkutan" required value="{{ isset($bank) ? $bank->url : old('url')}}">
                            @error('linkapi')
                            <div class=" alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="custom-select" id="status" name="status" required>
                                        <option {{ isset($bank) ? $bank->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                        <option {{ isset($bank) ? $bank->status == 0 ? 'selected' : '' : '' }} value="0">Non-aktif</option>
                                    </select>
                                    @error('status')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="thumbnail" name="thumbnail" {{ isset($bank) ? '' : 'required' }}>
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                    @if(isset($bank))
                                    <small class="text-muted font-italic">*Kosongi jika tidak ingin mengganti</small>
                                    @endif
                                    @error('thumbnail')
                                    <div class="alert alert-danger" role="alert">
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
@if(isset($bank) == false)
<script src="{{ asset('panel/assets/custom/admin/billing/bank.js') }}"></script>
@endif
@endpush