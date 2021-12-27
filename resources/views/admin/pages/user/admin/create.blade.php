@extends('admin.layouts.master')

@section('title', 'Admin Baru')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Admin Baru
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/admin') }}"> List Admin</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/admin/create') }}"> Admin Baru</a>
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
                <h3 class="block-title"><i class="fa fa-user-lock"></i> Admin Baru</h3>
            </div>
            <div class="block-content">

                @if (Request::url() == route('admin.create'))
                <form class="js-validation" action="{{ route('admin.store') }}" method="POST">
                    @else
                    <form class="js-validation" action="{{ route('admin.update', $admin->id) }}" method="POST">
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="First" required value="{{ isset($admin) ? $admin->first_name : old('first_name')}}">
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
                                    <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Last" value="{{ isset($admin) ? $admin->last_name : old('last_name')}}">
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
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ isset($admin) ? $admin->email : old('email')}}">
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
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" @if(isset($admin)) '' @else required @endif>
                                    @if(isset($admin))
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
                                    <label for="role_id">Role Admin <span class="text-danger">*</span></label>
                                    <select class="custom-select" id="role_id" name="role_id" required>
                                        @foreach($roles as $role)
                                        <option {{ isset($admin) ? $admin->role_id == $role->id ? 'selected' : '' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
                                        <option {{ isset($admin) ? $admin->status == 1 ? 'selected' : '' : '' }} value="1">Aktif</option>
                                        <option {{ isset($admin) ? $admin->status == 0 ? 'selected' : '' : '' }} value="0">Nonaktif</option>
                                    </select>
                                    @error('status')
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
<script src="{{ asset('panel/assets/custom/admin/user/admin.js') }}"></script>

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