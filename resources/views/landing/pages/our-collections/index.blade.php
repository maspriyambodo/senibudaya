@extends('landing.layouts.master')
@section('content')
    <section>
        <div class="axil-more-stories-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row align-items-center mb--30">
                    <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                        <div class="section-title">
                            <h2 class="title">OUR COLLECTIONS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collections', 'audio') }}">
                                    <img src="{{ asset('landing/images/our-collections/headphones.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="{{ route('landing.show-collections', 'audio') }}"><span>Audio</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collections', 'video') }}">
                                    <img src="{{ asset('landing/images/our-collections/tutorial.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="{{ route('landing.show-collections', 'video') }}"><span>Video</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collections', 'gambar') }}">
                                    <img src="{{ asset('landing/images/our-collections/burst.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="{{ route('landing.show-collections', 'gambar') }}"><span>Gambar</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collections', 'tulisan') }}">
                                    <img src="{{ asset('landing/images/our-collections/papers.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="{{ route('landing.show-collections', 'tulisan') }}"><span>Tulisan</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
