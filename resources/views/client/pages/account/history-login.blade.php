@extends('client.layouts.master')

@section('title', 'Halaman History Login')

@section('meta-description', '')

@section('meta-keyword', '')

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                History Login <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Riwayat login akun ke dalam panel</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Account</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url()->current() }}">History Login</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="block block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-paw"></i> Jejak Login</h3>
        </div>
        <div class="block-content">
            <!-- Jejak Login -->
            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-left">Waktu</th>
                            <th class="text-left">Browser</th>
                            <th class="text-left">Platform</th>
                            <th class="text-left">IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left font-size-sm">
                                <span class="badge badge-info">29 menit yang lalu</span>
                            </td>
                            <td class="text-left font-size-sm">
                                Chrome 92.0.4515.159
                            </td>
                            <td class="text-left font-size-sm">
                                Mac OS X
                            </td>
                            <td class="text-left font-size-sm">
                                36.74.55.24
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left font-size-sm">
                                <span class="badge badge-info">29 menit yang lalu</span>
                            </td>
                            <td class="text-left font-size-sm">
                                Chrome 92.0.4515.159
                            </td>
                            <td class="text-left font-size-sm">
                                Mac OS X
                            </td>
                            <td class="text-left font-size-sm">
                                36.74.55.24
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Jejak Login -->
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection