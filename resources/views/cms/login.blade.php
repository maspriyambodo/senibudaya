<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $param-> title }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <!-- Favicon icon -->
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

        <!-- vendor css -->
        <link rel="stylesheet" href="{{ asset('cms/css/style.css') }}" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        {!! ReCaptcha::htmlScriptTagJsApi() !!}
    </head>

    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <a href="{{ url('/') }}"><img src="{{ asset('images/logo-black.png') }}" alt="" style="height:100px" /></a>
            <div class="card">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form id="form" method="post" action="auth" class="needs-validation" novalidate="">
                                @csrf
                                <span class="text-validation">
                                    @if(session()->has('message'))
                                    <i class='fas fas fa-exclamation'></i> {{ session()->get('message') }}
                                    @endif
                                </span>
                                <span class="text-validate"></span>
                                <h5 class="mb-3 f-w-400">Content Management System</h5>
                                <div class="input-group mb-3">
                                    <input id="username" name="username" type="text" class="form-control" autocomplete="off" placeholder="Username" {{ noEmpty('Username tidak boleh kosong.') }} />
                                </div>
                                <div class="input-group mb-2">
                                    <input id="password" name="password" type="password" class="form-control" autocomplete="off" placeholder="Password" {{ noEmpty('Password tidak boleh kosong.') }} />
                                </div>
                                <div class="form-group text-left">
                                    <div class="checkbox checkbox-primary d-inline">
                                        <input id="show" type="checkbox" />
                                        <label for="show" class="cr"> show password</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! htmlFormSnippet() !!}
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mb-4 rounded-pill">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="saprator my-4"><span>{{ $param-> footer }}</span></div>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <script src="{{ asset('cms/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('cms/js/plugins/bootstrap.min.js') }}"></script>

    <!-- jquery-validation Js -->
    <script src="{{ asset('cms/js/plugins/jquery.validate.min.js') }}"></script>
    <!-- form-picker-custom Js -->
    <script src="{{ asset('cms/js/pages/form-validation.js') }}"></script>
    <script src="{{ asset('cms/js/login.js') }}"></script>

    <script>
$(document).ready(function () {
$('#form').submit(function () {
    if (
            $('#username').val().length > 0 &&
            $('#password').val().length > 0 &&
            grecaptcha.getResponse().length < 1
            ) {
        $('.text-validate').html("<i class='fas fas fa-exclamation'></i> Checked reCAPTCHA.");
        return false;
    }
});

$('.btn').click(function () {
    if ($('.text-validation').html().trim() == '<i class="fas fas fa-exclamation"></i> Username password tidak sesuai.')
        $('.text-validation').html('');
});
$('.form-control').keyup(function () {
    if ($('.text-validation').html().trim() == '<i class="fas fas fa-exclamation"></i> Username password tidak sesuai.')
        $('.text-validation').html('');
});
});
    </script>
</html>