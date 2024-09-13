@extends('landing.layouts.master')
@section('title', 'Profile')
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <h1 class="display-1 mb-5">Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog single mt-n17">
                        <div class="card shadow-lg mb-5">
                            <div class="card-body">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <h2 class="h1 mb-3">Profile</h2>
                                    <div class="form-floating mb-4">
                                        <input name="nama_user" id="nama_user" type="text" class="form-control @error('nama_user') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('nama_user', $user->nama_user) }}" required style="text-transform:uppercase">
                                        <label for="nama_user">Nama Lengkap</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input name="email_user" id="email_user" type="email" class="form-control @error('email_user') is-invalid @enderror" placeholder="Email" value="{{ old('email_user', $user->email_user) }}" required>
                                        <label for="email_user">Email</label>
                                        @error('email_user')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                                </form>
                            </div>
                        </div>

                        <div class="card shadow-lg">
                            <div class="card-body">
                                <form action="{{ route('profile.password') }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <h2 class="h1 mb-3">Update Password</h2>
                                    <div class="form-floating mb-4">
                                        <input name="current_password" id="current_password" type="password" class="form-control" placeholder="Current Password" autocomplete="current-password">
                                        <label for="current_password">Current Password</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input name="password" id="password" type="password" class="form-control" placeholder="New Password" autocomplete="new-password">
                                        <label for="password">New Password</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" autocomplete="new-password">
                                        <label for="password_confirmation">Confirm Password</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @if (session()->has('success'))
        <script>
            toastr.success("{{ session()->get('success') }}", {timeOut: 5000})
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            toastr.error("{{ session()->get('error') }}", {timeOut: 5000})
        </script>
    @endif
@endsection