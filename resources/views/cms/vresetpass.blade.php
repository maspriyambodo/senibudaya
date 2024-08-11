@extends('cms.layout_auth')
@section('content')
<script src="{{asset('metronic/reset-password.js') }}" type="text/javascript"></script>
<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="{{ url('req-password') }}" action="#">
    @csrf
    <div class="text-center mb-11">
        <a href="{{ url('/') }}" class="mb-0 mb-lg-12">
            <img alt="Logo" src="{{ asset('images/logo_kemenag.png') }}" class="h-60px h-lg-75px" />
        </a>
        <h1 class="text-gray-900 fw-bolder mb-3">
            {{ $page }}
        </h1>
        <div class="text-gray-500 fw-semibold fs-6">
            Enter your email to reset your password.
        </div>
    </div>

    <div class="separator separator-content my-14">
        <span class="w-125px text-gray-500 fw-semibold fs-7"></span>
    </div>
    <div class="fv-row mb-8 fv-plugins-icon-container">
        <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    {!! htmlFormSnippet() !!}
    <div class="d-flex flex-wrap justify-content-center pb-lg-0 mt-4">
        <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">

            <!--begin::Indicator label-->
            <span class="indicator-label">Submit</span>
            <!--end::Indicator label-->

            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>

        <a href="{{ url('login/') }}" class="btn btn-light">Cancel</a>
    </div>
</form>
@stop