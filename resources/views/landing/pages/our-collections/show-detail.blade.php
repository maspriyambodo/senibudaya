@extends('landing.layouts.master')
@section('title', $our_collection->nama)
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <div class="post-category text-line">
                            <a href="#" class="hover" rel="category">{{ $category->nama }}</a>
                        </div>
                        <h1 class="display-1 mb-4">{{ $our_collection->nama }}</h1>
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
                        <div class="card">
                            <figure class="card-img-top">
                                <img src="{{ asset($our_collection->banner_path) }}" alt="{{ $our_collection->nama }}" />
                            </figure>
                            <div class="card-body">
                                <div class="classic-view">
                                    <article class="post">
                                        <div class="post-content mb-5">
                                            {!! $our_collection->body !!}
                                        </div>

                                        <div class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
                                            <div class="mb-0 mb-md-2">
                                                <div class="dropdown share-dropdown btn-group">
                                                    <button class="btn btn-sm btn-red rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="uil uil-share-alt"></i> Share
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($our_collection->nama) }}" target="_blank">
                                                            <i class="uil uil-twitter"></i>Twitter
                                                        </a>
                                                        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
                                                            <i class="uil uil-facebook-f"></i>Facebook
                                                        </a>
                                                        <a class="dropdown-item" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($our_collection->nama) }}" target="_blank">
                                                            <i class="uil uil-linkedin"></i>Linkedin
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-14 mt-md-16">
                <div class="col-12">
                    <h3 class="display-4 mb-3">Koleksi Lainnya</h3>
                </div>
                @foreach($random_collections as $collection)
                  <div class="col-md-6 col-lg-3 mb-4">
                      <div class="card">
                          <figure class="card-img-top overlay overlay-1 hover-scale">
                              <a href="{{ route('landing.show-collection-detail', $collection->slug) }}">
                                  <img src="{{ asset($collection->banner_path) }}" alt="{{ $collection->nama }}" />
                              </a>
                              <figcaption>
                                  <h5 class="from-top mb-0">Lihat Detail</h5>
                              </figcaption>
                          </figure>
                          <div class="card-body">
                              <h4 class="mb-1">{{ $collection->nama }}</h4>
                          </div>
                      </div>
                  </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
