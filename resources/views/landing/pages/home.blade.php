@extends('landing.layouts.master')
@section('title', 'Home')
@section('stylesheet')
    <link href="{{ asset('leaflet/leaflet.css'); }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('leaflet/easy-button.css'); }}" rel="stylesheet" type="text/css"/>
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <section class="wrapper bg-light" id="home">
        <div class="container py-10">
            <div class="row gx-lg-8 gx-xl-11 gy-10 blog grid-view">
                <div class="col-lg-8">
                    <article class="post">
                        <div class="post-slider rounded mb-6">
                            <div class="swiper-container dots-over" data-margin="5" data-dots="true">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset($main_our_collection_1->banner_path) }}" alt="{{ $main_our_collection_1->nama }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-header mb-5">
                            <h2 class="post-title mt-1 mb-4">
                                <a class="link-dark" href="{{ route('landing.show-collection-detail', $main_our_collection_1->slug) }}">{{ $main_our_collection_1->nama }}</a>
                            </h2>
                            <ul class="post-meta mb-0">
                                <li class="post-date">
                                    <i class="uil uil-calendar-alt"></i>
                                    <span>{{ $main_our_collection_1->created_at->format('d M Y') }}</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <div class="row gy-10">
                        @foreach($main_our_collection_2 as $val)
                            <div class="col-md-6 col-lg-12">
                                <article class="post">
                                    <figure class="rounded mb-5">
                                        <img src="{{ asset($val->banner_path) }}" alt="{{ $val->nama }}" />
                                    </figure>
                                    <div class="post-header">
                                        <h2 class="post-title h3 mt-1 mb-3">
                                            <a class="link-dark" href="{{ route('landing.show-collection-detail', $val->slug) }}">{{ $val->nama }}</a>
                                        </h2>
                                    </div>
                                    <div class="post-footer">
                                        <ul class="post-meta">
                                            <li class="post-date">
                                                <i class="uil uil-calendar-alt"></i>
                                                <span>{{ $val->created_at->format('d M Y') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light" id="our-collections">
        <div class="container py-10">
            <div class="row">
                <div class="col-lg-12 col-xl-10 col-xxl-7 mx-auto text-center">
                    <h2 class="display-5 text-center mt-2 mb-10">Koleksi</h2>
                </div>
            </div>
            <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0 text-center">
                @foreach($categories_our_collection as $category)
                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                        <div class="card shadow-lg">
                            <div class="card-body p-6">
                                <figure class="card-img-top">
                                    <a href="{{ route('landing.show-collections', $category->slug) }}">
                                        <img src="{{ asset($category->icon_path) }}" class="svg-inject icon-svg icon-svg-lg text-primary" alt="{{ $category->nama }}" />
                                    </a>
                                </figure>
                                <h3 class="fs-21 mb-0">{{ $category->nama }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="wrapper bg-light" id="facts">
        <div class="container py-10">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="card image-wrapper bg-full bg-image bg-overlay" data-image-src="/landing/img/photos/bg2.jpg">
                        <div class="card-body p-9 p-xl-10">
                            <div class="row align-items-center counter-wrapper gy-4 text-center text-white">
                                <div class="col-6 col-lg-3">
                                    <h3 class="counter counter-lg text-white">{{ $total_our_collections }}</h3>
                                    <p>Total Koleksi</p>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <h3 class="counter counter-lg text-white">{{ $total_audio }}</h3>
                                    <p>Koleksi Audio</p>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <h3 class="counter counter-lg text-white">{{ $total_video }}</h3>
                                    <p>Koleksi Video</p>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <h3 class="counter counter-lg text-white">{{ $total_photo }}</h3>
                                    <p>Koleksi Gambar</p>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <h3 class="counter counter-lg text-white">{{ $total_document }}</h3>
                                    <p>Koleksi Tulisan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light" id="peta-sebaran">
        <div class="container py-10">
            <div class="row">
                <div class="col-lg-12 col-xl-10 col-xxl-7 mx-auto text-center">
                    <h2 class="display-5 text-center mt-2 mb-10">Peta Sebaran</h2>
                </div>
            </div>
            <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0 text-center">
                <div id="map" class="w-100 h-550px"></div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light" id="latest-our-collections">
        <div class="container py-14 py-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
                <div class="col-lg-4 mt-lg-2">
                    <h2 class="display-4 mb-3">Koleksi Terbaru</h2>
                    <p class="lead fs-lg mb-6 pe-xxl-5">Berikut adalah beberapa koleksi pilihan terbaru lainnya.</p>
                    <a href="#" class="btn btn-soft-primary rounded-pill">Lihat Semua</a>
                </div>
                <div class="col-lg-8">
                    <div class="swiper-container blog grid-view mb-6" data-margin="30" data-dots="true" data-items-md="2" data-items-xs="1">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach($dta_our_collection as $val)
                                    <div class="swiper-slide">
                                        <article>
                                            <figure class="rounded mb-5">
                                                <img src="{{ asset($val->banner_path) }}" alt="{{ $val->nama }}" />
                                            </figure>
                                            <div class="post-header">
                                                <h2 class="post-title h3 mt-1 mb-3">
                                                    <a class="link-dark" href="{{ route('landing.show-collection-detail', $val->slug) }}">{{ $val->nama }}</a>
                                                </h2>
                                            </div>
                                            <div class="post-footer">
                                                <ul class="post-meta mb-0">
                                                    <li class="post-date">
                                                        <i class="uil uil-calendar-alt"></i>
                                                        <span>{{ $val->created_at->format('d M Y') }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('leaflet/leaflet.js'); }}" type="text/javascript"></script>
    <script src="{{ asset('leaflet/leaflet.zoomhome.min.js'); }}" type="text/javascript"></script>
    <script src="{{ asset('leaflet/easy-button.js'); }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
          var url_geojson = '{{ route('landing.peta-sebaran') }}';
          var map = L.map('map', {
            closePopupOnClick: false,
            zoomControl: false
          }).setView([-2.5489, 118.0149], 5);
          var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=y&hl=id&x={x}&y={y}&z={z}', {
            maxZoom: 10,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
          }).addTo(map);

          function get_prov() {
            fetch(url_geojson).then(res => res.json()).then(data => {
              quake = L.geoJson(data, {
                onEachFeature: function(feature, layer) {
                  var popupContent = 'Provinsi: ' + feature.properties.Provinsi + '<br>' +
                    'Total Koleksi: ' + feature.properties.total;
                  var popup;
                  popup = layer.bindPopup(popupContent, {
                    closeButton: false
                  });
                  popup.on("popupclose", function(e) {});

                  layer.on('dblclick', function(e) {
                    map.setView(e.latlng, 7);
                    id_prov = feature.properties.id_provinsi;
                  });
                },
                pointToLayer: function(feature, latlng) {
                  return L.marker(latlng);
                }
              }).addTo(map);
              map.setView(new L.LatLng(-0.9, 117.2837585), 5);
            });
          }

          get_prov();

          var stateChangingButton = L.easyButton({
            states: [{
              stateName: 'zoom-to-forest',
              icon: 'fa-home',
              title: 'zoom to a forest',
              onClick: function(btn, map) {
                get_prov();
                $(".leaflet-marker-icon").remove();
                $(".leaflet-popup").remove();
                $(".leaflet-marker-shadow").remove();
              }
            }]
          });

          stateChangingButton.addTo(map);
        });
    </script>
@endsection