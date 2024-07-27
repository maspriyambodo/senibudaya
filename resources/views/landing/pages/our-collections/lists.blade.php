@extends('landing.layouts.master')
@section('content')
    <section>
        <div class="axil-more-stories-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">{{ ucfirst($type) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-01.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-02.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-03.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-04.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-01.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-02.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-03.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">
                                    <img src="/landing/images/post-single/stories-04.jpg" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h5 class="title"><a href="{{ route('landing.show-collection-detail', 'test-slug-here') }}">Microsoft and Bridgestone launch real-time tire</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
