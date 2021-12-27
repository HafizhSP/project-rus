@extends('admin.layouts.master')

@section('title', 'List API Product')

@push('style')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@push('custom-style')
<link rel="stylesheet" href="{{ asset('panel/assets/js/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                List API Product
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/manage/api/product') }}"> List API Product</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->


<div class="content">

    <!-- Search Form -->
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="form-group text-center">
                <small for="vendor"><b>API Vendor</b></small>
                <select class="js-select2 form-control" id="vendor" name="vendor" style=" width: 100%;" data-placeholder="Pilih API Vendor..">
                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    @foreach ($vendors as $vendor)
                    <option {{ last(request()->segments()) == $vendor->id ? 'selected' : '' }} value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- END Search Form -->

    <!-- List Pemesanan -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-book-open"></i> API Product</h3>
        </div>
        <div class="block-content">
            <!-- List Pemesanan Table -->
            <div class="table-responsive pb-3">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="min-width: 50px">API ID</th>
                            <th class="text-center" style="min-width: 180px">Nama Layanan</th>
                            <th class="text-center">Min</th>
                            <th class="text-center">Max</th>
                            <th class="text-center" style="min-width: 60px">Harga (/1K)</th>
                            <th>Note</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($result))
                        @foreach ($result as $item)
                        @if (stripos($vendor_name, 'Irvan') !== false )
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{$item->id}}
                                @if(isset($item->prod_id))<p class="mt-3 text-muted"><i>{{ $item->prod_id }}</i></p>@endif
                            </td>
                            <td class="font-size-sm">
                                <b>{{$item->name}}</b>
                                @if(isset($item->prod_name))<p class="mt-3 text-muted"><i>{{ $item->prod_name }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->min}}
                                @if(isset($item->prod_min))<p class="mt-3 text-muted"><i>{{ $item->prod_min }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->max}}
                                @if(isset($item->prod_max))<p class="mt-3 text-muted"><i>{{ $item->prod_max }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                Rp. {{number_format($item->price,0,",",".")}}
                                @if(isset($item->hjual))<p class="mt-3 text-muted"><i>Rp. {{number_format($item->hjual,0,",",".")}}</i></p>@endif
                            </td>
                            <td>
                                <small>{{$item->note}}</small>
                            </td>
                            <td>
                                <small>-</small>
                            </td>
                            <td class="text-center">
                                @if(isset($item->prod_id))
                                <a class="btn btn-sm btn-warning btn-block" href="{{ route('list.edit', $item->prod_id) }}">Edit</a>
                                @else
                                <form action="{{ route('add_product') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="api_vendor_id" value="{{ last(request()->segments()) }}">
                                    <input type="hidden" name="api_id" value="{{ $item->id }}">
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="margin" value="10">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="min" value="{{ $item->min }}">
                                    <input type="hidden" name="max" value="{{ $item->max }}">
                                    <input type="hidden" name="hbeli" value="{{ $item->price }}">
                                    <input type="hidden" name="hjual" value="{{ ($item->price * (10/100)) + $item->price }}">
                                    <input type="hidden" name="desc" value="{{ $item->note }}">
                                    <button class="btn btn-sm btn-info btn-block" type="submit">
                                        Tambah
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @elseif (stripos($vendor_name, 'Amazing') !== false )
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{$item->service}}
                                @if(isset($item->prod_id))<p class="mt-3 text-muted"><i>{{ $item->prod_id }}</i></p>@endif
                            </td>
                            <td class="font-size-sm">
                                <b>{{$item->name}}</b>
                                @if(isset($item->prod_name))<p class="mt-3 text-muted"><i>{{ $item->prod_name }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->min}}
                                @if(isset($item->prod_min))<p class="mt-3 text-muted"><i>{{ $item->prod_min }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->max}}
                                @if(isset($item->prod_max))<p class="mt-3 text-muted"><i>{{ $item->prod_max }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                ${{$item->rate}}
                                @if(isset($item->hjual))<p class="mt-3 text-muted"><i>Rp. {{number_format($item->hjual,0,",",".")}} / ${{ number_format($item->hjual/15000,2,",",".") }}</i></p>@endif
                            </td>
                            <td>
                                <small>{{$item->category}} || Refill: {{ $item->refill==1 ? 'Yes' : 'No'}}</small>
                            </td>
                            <td>
                                <small>{{$item->type}}</small>
                            </td>
                            <td class="text-center">
                                @if(isset($item->prod_id))
                                <a class="btn btn-sm btn-warning btn-block" href="{{ route('list.edit', $item->prod_id) }}">Edit</a>
                                @else
                                <form action="{{ route('add_product') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="api_vendor_id" value="{{ last(request()->segments()) }}">
                                    <input type="hidden" name="api_id" value="{{ $item->service }}">
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="margin" value="10">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="min" value="{{ $item->min }}">
                                    <input type="hidden" name="max" value="{{ $item->max }}">
                                    <input type="hidden" name="hbeli" value="{{ ($item->rate * 15000) }}">
                                    <input type="hidden" name="hjual" value="{{ (($item->rate * 15000) * (10/100)) + ($item->rate * 15000) }}">
                                    <input type="hidden" name="desc" value="{{ $item->category }}">
                                    <button class="btn btn-sm btn-info btn-block" type="submit">
                                        Tambah
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @elseif (stripos($vendor_name, 'Daily') !== false )
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{$item->id}}
                                @if(isset($item->prod_id))<p class="mt-3 text-muted"><i>{{ $item->prod_id }}</i></p>@endif
                            </td>
                            <td class="font-size-sm">
                                <b>{{$item->layanan}}</b>
                                @if(isset($item->prod_name))<p class="mt-3 text-muted"><i>{{ $item->prod_name }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->min}}
                                @if(isset($item->prod_min))<p class="mt-3 text-muted"><i>{{ $item->prod_min }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->maks}}
                                @if(isset($item->prod_max))<p class="mt-3 text-muted"><i>{{ $item->prod_max }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                Rp. {{number_format($item->harga,0,",",".")}}
                                @if(isset($item->hjual))<p class="mt-3 text-muted"><i>Rp. {{number_format($item->hjual,0,",",".")}}</i></p>@endif
                            </td>
                            <td>
                                <small>{{$item->keterangan}}</small>
                            </td>
                            <td>
                                <small>{{$item->status}}</small>
                            </td>
                            <td class="text-center">
                                @if(isset($item->prod_id))
                                <a class="btn btn-sm btn-warning btn-block" href="{{ route('list.edit', $item->prod_id) }}">Edit</a>
                                @else
                                <form action="{{ route('add_product') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="api_vendor_id" value="{{ $vendor_id }}">
                                    <input type="hidden" name="api_id" value="{{ $item->id }}">
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="margin" value="10">
                                    <input type="hidden" name="name" value="{{ $item->layanan }}">
                                    <input type="hidden" name="min" value="{{ $item->min }}">
                                    <input type="hidden" name="max" value="{{ $item->maks }}">
                                    <input type="hidden" name="hbeli" value="{{ $item->harga }}">
                                    <input type="hidden" name="hjual" value="{{ ($item->harga * (10/100)) + $item->harga }}">
                                    <input type="hidden" name="desc" value="{{ $item->keterangan }}">
                                    <button class="btn btn-sm btn-info btn-block" type="submit">
                                        Tambah
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @elseif (stripos($vendor_name, 'Emhapras') !== false )
                        <tr>
                            <td class="text-center font-w600 font-size-sm">
                                {{$item->id}}
                                @if(isset($item->prod_id))<p class="mt-3 text-muted"><i>{{ $item->prod_id }}</i></p>@endif
                            </td>
                            <td class="font-size-sm">
                                <b>{{$item->name}}</b>
                                @if(isset($item->prod_name))<p class="mt-3 text-muted"><i>{{ $item->prod_name }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->min}}
                                @if(isset($item->prod_min))<p class="mt-3 text-muted"><i>{{ $item->prod_min }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                {{$item->max}}
                                @if(isset($item->prod_max))<p class="mt-3 text-muted"><i>{{ $item->prod_max }}</i></p>@endif
                            </td>
                            <td class="text-center font-size-sm">
                                Rp. {{number_format($item->price,0,",",".")}}
                                @if(isset($item->hjual))<p class="mt-3 text-muted"><i>Rp. {{number_format($item->hjual,0,",",".")}}</i></p>@endif
                            </td>
                            <td>
                                <small>{{$item->category_name}}</small>
                            </td>
                            <td>
                                <small>{{$item->type}}</small>
                            </td>
                            <td class="text-center">
                                @if(isset($item->prod_id))
                                <a class="btn btn-sm btn-warning btn-block" href="{{ route('list.edit', $item->prod_id) }}">Edit</a>
                                @else
                                <form action="{{ route('add_product') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="api_vendor_id" value="{{ $vendor_id }}">
                                    <input type="hidden" name="api_id" value="{{ $item->id }}">
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="margin" value="10">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="min" value="{{ $item->min }}">
                                    <input type="hidden" name="max" value="{{ $item->max }}">
                                    <input type="hidden" name="hbeli" value="{{ $item->price }}">
                                    <input type="hidden" name="hjual" value="{{ ($item->price * (10/100)) + $item->price }}">
                                    <input type="hidden" name="desc" value="{{ $item->category_name }}">
                                    <button class="btn btn-sm btn-info btn-block" type="submit">
                                        Tambah
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- END List Pemesanan Table -->
        </div>
    </div>
    <!-- END List Pemesanan -->
</div>

@endsection

@push('script')
<!-- Datatables -->
<script src="{{ asset('panel/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panel/assets/custom/admin/datatables.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('panel/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    jQuery(function() {
        One.helpers('select2');
    });
</script>

<script>
    $(document).ready(function() {
        $('#vendor').on('change', function() {
            var current_url = <?= json_encode(route('api_product')) ?>;
            var vendor_id = $(this).val(); // get selected value
            if (vendor_id) {
                var url = current_url + '/' + vendor_id;
                window.location = url;
            }
            return false;
        });

        // DataTables Init
        $('.js-dataTable-full-pagination').dataTable({
            pagingType: "full_numbers",
            pageLength: 10,
            order: [],
            lengthMenu: [
                [5, 10, 15, 20],
                [5, 10, 15, 20]
            ],
            autoWidth: false,
        });
    });
</script>


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