@extends('client.layouts.master')

@section('title', 'Pusat Informasi')

@section('meta-description', '')

@section('meta-keyword', '')

@push('style')
@endpush

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Pusat Informasi <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">segala informasi tentang layanan seputar SMMReseller</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Support</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/') }}"> Informasi Update</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <!-- Pusat Informasi -->
            <div class="col-lg-12">
                <div class="block block-rounded block-mode-loading-oneui">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><i class="fa fa-info-circle"></i> Pusat Informasi</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <ul class="timeline timeline-alt">
                            <li class="timeline-event">
                                <div class="timeline-event-icon bg-dark">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="timeline-event-block block invisible" data-toggle="appear">
                                    <div class="block-header block-header-default">
                                        <small class="block-title text-muted">Informasi</small>
                                        <small class="block-options">
                                            <div class="timeline-event-time block-options-item font-size-sm text-muted">
                                                30 Aug 2021 | 21:44
                                            </div>
                                        </small>
                                    </div>
                                    <div class="block-content">
                                        <h4 class="font-weight-bold">Test 1</h4>
                                        <div class="content-information">
                                            Testing saja
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END Pusat Informasi -->

        </div>
    </div>
</div>


@endsection

@push('script')
@endpush