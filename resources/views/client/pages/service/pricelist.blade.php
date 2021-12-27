@extends('client.layouts.master')

@section('title', 'Daftar Harga')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
<link rel="stylesheet" href="{{ asset('panel/assets/custom/client/order/new-order.css') }}">
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Daftar Layanan <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">menampilkan semua harga dan layanan yang kami sediakan</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ route('pricelist.index') }}"> Daftar Harga</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <!-- Daftar Layanan -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-list-ul"></i> Daftar Layanan</h3>
        </div>
        <div class="block-content">

            <!-- Search Form -->
            <form action="{{ route('pricelist.index') }}" method="get">
                <div class="form-group ">
                    <div class="controls d-flex justify-content-center flex-wrap">

                        @foreach ($socmeds as $socmed)
                        <div class="pilih-sosmed">
                            <input type="radio" onchange="this.form.submit();" name="socmed" id="socmed_{{ $socmed->id }}" value="{{ $socmed->id }}" {{ (request()->query('socmed')) == $socmed->id ? 'checked' : '' }}>
                            <label class="label-sosmed" for="socmed_{{ $socmed->id }}">
                                <img src="{{ asset("storage/images/socmed/$socmed->thumbnail")}}" height="60" width="60">
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>
            </form>
            <!-- END Search Form -->

            <!-- Daftar Layanan Table -->
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                    @if(count($categories) > 0)
                    @foreach($categories as $category)
                    <thead>
                        <tr style="background-color: #959da1; color: white;" class="text-center">
                            <th colspan="7">
                                <i class="fa fa-dot-circle"></i> INSTAGRAM FOLLOWERS INDONESIA <i class="fa fa-dot-circle"></i>
                            </th>
                        </tr>
                        <tr style="background-color: #afb8bd;">
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th class="text-left">Nama Layanan</th>
                            <th class="text-left">Min</th>
                            <th class="text-left">Maks</th>
                            <th class="text-left">Harga/1K</th>
                            <th class="text-left">Keterangan</th>
                            <th class="text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($products) > 0)
                        @foreach ($products as $product)
                        @if($product->service_category_id == $category->id)
                        <tr>
                            <td class="text-center font-size-sm">
                                <span class="font-w600 text-primary">
                                    <strong>{{ $product->id }}</strong>
                                </span>
                            </td>
                            <td class="text-left font-size-sm">
                                {{ $product->name }}
                            </td>
                            <td class="text-left font-size-sm">{{ $product->min }}</td>
                            <td class="text-left font-size-sm">{{ $product->max }}</td>
                            <td class="text-left font-size-sm"> Rp. {{number_format($product->hjual,0,",",".")}}</td>
                            <td class="text-left font-size-sm">
                                {{ $product->desc }}
                            </td>
                            <td class="text-center font-size-sm">
                                @if($product->status == 1)
                                <span class="badge badge-warning">ON</span>
                                @else
                                <span class="badge badge-danger">OFF</span>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center">No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td class="text-left">No Data</td>
                            <td class="text-left">No Data</td>
                            <td class="text-left">No Data</td>
                        </tr>
                        @endif

                    </tbody>
                    @endforeach
                    @else
                    <thead>
                        <tr style="background-color: #afb8bd;">
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th class="text-left">Nama Layanan</th>
                            <th class="text-left">Min</th>
                            <th class="text-left">Maks</th>
                            <th class="text-left">Harga/1K</th>
                            <th class="text-left">Keterangan</th>
                            <th class="text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td class="text-left">No Data</td>
                            <td class="text-left">No Data</td>
                            <td class="text-left">No Data</td>
                        </tr>
                    </tbody>
                    @endif
                </table>
            </div>
            <!-- END Daftar Layanan Table -->

        </div>
    </div>
    <!-- END Daftar Layanan -->
</div>

@endsection