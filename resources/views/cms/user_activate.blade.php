@extends('cms.layout_auth')
@section('content')
<div class="text-center mb-10">
    <h1 class="fw-bolder mb-3 text-success">your account has been successfully activated</h1>
    <div class="text-gray-500 fw-semibold fs-6">
        you are ready to use the application
        <a href="{{ url('login') }}" class="link-primary fw-bold"> Sign in</a>
    </div>
</div>
@stop