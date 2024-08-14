@extends('landing.layouts.master')
@section('title', 'Our Collections')
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-10 pt-md-14 pb-md-10 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <h1 class="display-1 mb-5">{{ ucfirst($type) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container py-md-16">
            <div class="row">
                    <form class="filter-form mb-10">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                            </div>

                            <div class="col-md-12 col-lg-3 mb-3">
                                <div class="form-select-wrapper">
                                    <select class="form-select" name="filter">
                                        <option value="Pencipta" selected>Pencipta</option>
                                        <option value="Kota/Kab">Kota/Kab</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Tahun">Tahun</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-3 mb-3">
                                <div class="form-select-wrapper">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>

            <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative">
                        <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset('landing/img/avatars/t1.jpg'); }}" srcset="{{ asset('landing/img/avatars/t1@2x.jpg'); }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">Coriss Ambady</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
