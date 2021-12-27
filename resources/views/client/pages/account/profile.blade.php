@extends('client.layouts.master')

@section('title', 'Halaman Detail Profil')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Hero -->
<div class="bg-image" style="background-image: url('/panel/assets/media/photos/photo8@2x.jpg');">
    <div class="bg-black-75">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="{{ asset('panel/assets/media/avatars/avatar13.jpg') }}" alt="">
            </div>
            <h1 class="h2 text-white mb-0">Edit Account</h1>
            <h2 class="h4 font-w400 text-white-75">
                John Parker
            </h2>
            <div>
                <a href="#ganti" data-toggle="modal" class="btn btn-sm btn-success">Ubah Foto Profil</a>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Berhubung anda menggunakan akun <b>DEMO</b>, anda tidak bisa mengubah data profil anda</div>
        </div>
        <div class="col-md-6">
            <div class="block block-bordered block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-address-card"></i> <small>Informasi Akun</small></h3>
                </div>
                <div class="block-content">
                    <div class="row push">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="one-profile-edit-name">Username</label>
                                <input type="text" class="form-control" value="123" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" value="123" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="one-profile-edit-username">Saldo</label>
                                <input type="text" class="form-control" value="Rp. 100.000" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="one-profile-edit-username">Tipe Reseller</label>
                                <input type="text" class="form-control" value="Reseller Premium" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>API Key</label>
                                <div class="input-group">
                                    <input type="text" class="form-control font-size-sm font-w600 text-primary" readonly value="a2b50dc41d6ce2a316912daa2c702a03">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm" onclick="copyKey('a2b50dc41d6ce2a316912daa2c702a03')" data-toggle="tooltip" data-animation="true" data-placement="top" title="Copy">
                                            <i class="far fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block block-bordered block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-newspaper"></i> <small>Ubah Data</small></h3>
                </div>
                <div class="block-content">
                    <div class="row push">
                        <input type="hidden" name="toggle" value="34" style="display:none;" />
                        <div class="col-12">
                            <div class="form-group">
                                <label for="one-profile-edit-password">Password Lama</label>
                                <input type="password" class="form-control" minlen="4" name="oldpass" id="oldpass" placeholder="*******" required autofocus>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="one-profile-edit-password-new">Password Baru</label>
                                <input type="password" class="form-control" matchd="cpass" name="newpass" id="newpass" minlen="4" label_minlen="" placeholder="*******" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="one-profile-edit-password-new-confirm">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" name="cpass" id="cpass" minlen="4" label_minlen="" placeholder="*******" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Ubah Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection