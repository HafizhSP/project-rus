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
                Panduan Reseller <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Panduan umum menggunakan platform SMMReseller</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Support</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{ url('/support/tips') }}"> Panduan Reseller</a>
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

            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-hands-helping"></i> Panduan Reseller</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div id="faq" class="m-2" role="tablist" aria-multiselectable="true">

                        <div class="block block-rounded block-bordered mb-1">
                            <a class="block-header block-header-default text-muted" role="tab" id="faq_head_1" href="#faq_1" aria-controls="faq_1" data-toggle="collapse" aria-expanded="true" data-parent="#faq">
                                No Data
                            </a>
                            <div class="collapse hide" role="tabpanel" aria-labelledby="faq_head_1" id="faq_1" data-parent="#faq">
                                <div class="block-content">
                                    <p>No Data</p>
                                </div>
                            </div>
                        </div>
                        <div class="block block-rounded block-bordered mb-1">
                            <a class="block-header block-header-default text-muted" role="tab" id="faq_head_2" href="#faq_2" aria-controls="faq_2" data-toggle="collapse" aria-expanded="true" data-parent="#faq">
                                AAAA
                            </a>
                            <div class="collapse hide" role="tabpanel" aria-labelledby="faq_head_2" id="faq_2" data-parent="#faq">
                                <div class="block-content">
                                    <p>AAAA</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('script')
@endpush