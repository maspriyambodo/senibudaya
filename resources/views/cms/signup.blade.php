@extends('cms.layout_auth')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('metronic/signup.js') }}"></script>
<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="register" action="#">
@csrf
<div class="text-center mb-11">
<a href="{{ url('/') }}" class="mb-0 mb-lg-12">
<img alt="Logo" src="{{ asset('images/logo_kemenag.png') }}" class="h-60px h-lg-75px" />
</a>
<h1 class="text-gray-900 fw-bolder mb-3">
{{ $page }}
</h1>
</div>
<div class="separator separator-content my-14">
<span class="w-125px text-gray-500 fw-semibold fs-7"></span>
</div>
<div class="fv-row mb-8 fv-plugins-icon-container">
<input type="text" placeholder="Nama Lengkap" name="namatxt" autocomplete="off" class="form-control bg-transparent" />
<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
</div>
<div class="fv-row mb-8 fv-plugins-icon-container">
<input type="text" placeholder="Email" name="username" autocomplete="off" class="form-control bg-transparent" />
<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
</div>
<div class="fv-row mb-8" data-kt-password-meter="true">
<div class="mb-1">
<div class="position-relative mb-3">
<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off"/>
<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
<i class="fa-solid fa-eye fs-2"></i><i class="fa-solid fa-eye-slash fs-2 d-none"></i>
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
Gunakan 8 karakter atau lebih dengan campuran huruf, angka, dan simbol.
</div>
</div>
<div class="fv-row mb-8">
<input type="password" placeholder="Repeat Password" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent"/>
</div>
{!! htmlFormSnippet() !!}
<div class="d-grid mb-5 mt-10">
<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
<span class="indicator-label"> Sign Up</span>
<span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
</button>
</div>
<div class="text-gray-500 text-center fw-semibold fs-6">
Already have an Account?
<a href="{{ url('login') }}" class="link-primary">
Sign In
</a>
</div>
</form>
@stop