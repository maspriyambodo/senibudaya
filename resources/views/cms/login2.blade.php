@extends('cms.layout_auth')
@section('content')
<script src="{{ asset('metronic/general.js') }}"></script>
<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="auth" action="#">
    @csrf
    <div class="text-center mb-11">
        <a href="{{ url('/') }}" class="mb-0 mb-lg-12">
            <img alt="Logo" src="{{ asset('images/logo_kemenag.png') }}" class="h-60px h-lg-75px" />
        </a>
        <h1 class="text-gray-900 fw-bolder mb-3">
            Sign In
        </h1>
    </div>

    <div class="separator separator-content my-14">
        <span class="w-125px text-gray-500 fw-semibold fs-7"></span>
    </div>
    <div class="fv-row mb-8 fv-plugins-icon-container">
        <input type="text" placeholder="Email" name="username" autocomplete="off" class="form-control bg-transparent" />
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <div class="fv-row mb-3 fv-plugins-icon-container">
        <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <a href="https://preview.keenthemes.com/metronic8/demo1/authentication/layouts/corporate/reset-password.html" class="link-primary">
            Forgot Password ?
        </a>
    </div>
    {!! htmlFormSnippet() !!}
    <div class="d-grid mb-5 mt-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <span class="indicator-label"> Sign In</span>
            <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
        </button>
    </div>
    <div class="text-gray-500 text-center fw-semibold fs-6">
        Not a Member yet?
        <a href="https://preview.keenthemes.com/metronic8/demo1/authentication/layouts/corporate/sign-up.html" class="link-primary">
            Sign up
        </a>
    </div>
</form>
@stop