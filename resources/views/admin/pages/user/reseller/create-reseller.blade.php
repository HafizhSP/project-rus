@extends('admin.layouts.master')

@section('title', 'Reseller Baru')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Reseller Baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/reseller') }}"> List Reseller</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/reseller/create') }}"> Reseller Baru</a>
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
                <h3 class="block-title"><i class="fa fa-users"></i> Reseller Baru</h3>
                <div class="block-options">
                    @if(isset($reseller))
                    <form action="{{ route('reseller.new-admin', $reseller->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button type="button" class="btn btn-sm btn-danger selectButton">
                            Make as Admin
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            <div class="block-content">

                @if (Request::url() == route('reseller.create'))
                <form class="js-validation" action="{{ route('reseller.store') }}" method="POST">
                    @else
                    <form class="js-validation" action="{{ route('reseller.update', $reseller->id) }}" method="POST">
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="First" required value="{{ isset($reseller) ? $reseller->first_name : old('first_name')}}">
                                    @error('first_name')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Last" value="{{ isset($reseller) ? $reseller->last_name : old('last_name')}}">
                                    @error('last_name')
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
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ isset($reseller) ? $reseller->email : old('email')}}">
                                    @error('email')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span> <i class="si si-info fa-xs" data-toggle="popover" data-animation="true" data-placement="top" title="Password" data-html="true" data-content="Min 8 Character <br/> Contain at least One Uppercase <br/> Contain at least One Lowercase letter"></i></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" @if(isset($reseller)) '' @else required @endif>
                                    @if(isset($reseller))
                                    <small class="text-muted">*Kosongi jika tidak ingin mengganti password</small>
                                    @endif
                                    @error('password')
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
                                    <label for="balance">Saldo <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Rp.
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="balance" name="balance" placeholder="51000" required value="{{ isset($reseller) ? $reseller->balance : old('balance')}}">
                                    </div>
                                    @error('balance')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="reseller_type">Paket Reseller <span class="text-danger">*</span></label>
                                    <select class="custom-select" id="reseller_type" name="reseller_type" required>
                                        <option value="1">Reseller AAA</option>
                                        <option value="2">Reseller BBB</option>
                                    </select>
                                    @error('reseller_type')
                                    <div class=" alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="custom-select" id="status" name="status" required>
                                <option {{ isset($reseller) ? $reseller->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                <option {{ isset($reseller) ? $reseller->status == 0 ? 'selected' : '' : '' }} value="0">Nonaktif</option>
                            </select>
                            @error('status')
                            <div class=" alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
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
<script src="{{ asset('panel/assets/custom/admin/user/reseller.js') }}"></script>

<!-- Sweet Alert -->
@if(session('success'))
<script>
    Swal.fire(
        'Success!',
        "{{ session('success') }}",
        'success'
    )
</script>
@elseif(session('errors'))
<script>
    Swal.fire(
        'Error!',
        "{{$errors->first()}}",
        'error'
    )
</script>
@endif
@endpush