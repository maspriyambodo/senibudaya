@extends('cms.layout_auth')
@section('content')
@if($valid_time)
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{asset('metronic/new-password.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="{{ url('setup-password') }}" action="#">
    @csrf
    <input type="hidden" name="user_email" readonly="" value="{{ $user_email }}"/>
    <div class="text-center mb-10">
        <h1 class="text-gray-900 fw-bolder mb-3">
            Setup New Password
        </h1>
        <div class="text-gray-500 fw-semibold fs-6">
            Have you already reset the password ?
            <a href="{{ url('login') }}" class="link-primary fw-bold">
                Sign in
            </a>
        </div>
    </div>
    <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
        <div class="mb-1">
            <div class="position-relative mb-3">
                <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off">
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="fa-solid fa-eye fs-2"></i>
                    <i class="fa-solid fa-eye-slash fs-2 d-none"></i>
                    </span>
                </span>
            </div>
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
            </div>
        </div>
        <div class="text-muted">
            Use 8 or more characters with a mix of letters, numbers &amp; symbols.
        </div>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
    <div class="fv-row mb-8 fv-plugins-icon-container">
        <input type="password" placeholder="Repeat Password" name="confirm-password" autocomplete="off" class="form-control bg-transparent">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
    <div class="fv-row mb-8 fv-plugins-icon-container">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="toc" value="1">
            <span class="form-check-label fw-semibold text-gray-700 fs-6 ms-1">
                I have remembered or saved the new password
            </span>
        </label>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
    <div class="d-grid mb-10">
        <button type="button" id="kt_new_password_submit" class="btn btn-primary">
            <span class="indicator-label">
                Submit</span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
</form>
@else
<div class="text-center mb-10">
    <h1 class="text-gray-900 fw-bolder mb-3">url address has expired</h1>
    <div class="text-gray-500 fw-semibold fs-6">
        Have you already reset the password ? 
        <a href="{{ url('login') }}" class="link-primary fw-bold"> Sign in </a>
    </div>
</div>
@endif
@stop