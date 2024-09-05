@extends('landing.layouts.master')
@section('title', $categories_our_collection->nama)
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-10 pt-md-14 pb-md-10 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <h1 class="display-1 mb-5">{{ $categories_our_collection->nama }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container py-md-16">
            <div class="row">
                <form class="filter-form mb-10" method="GET" action="{{ route('landing.show-collections', $categories_our_collection->slug) }}">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 mb-3">
                            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-12 col-lg-3 mb-3">
                            <div class="form-select-wrapper">
                                <select class="form-select" name="filter">
                                    <option value="Pencipta" {{ request('filter') == 'Pencipta' ? 'selected' : '' }}>Pencipta</option>
                                    <option value="Kota/Kab" {{ request('filter') == 'Kota/Kab' ? 'selected' : '' }}>Kota/Kab</option>
                                    <option value="Provinsi" {{ request('filter') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                    <option value="Tahun" {{ request('filter') == 'Tahun' ? 'selected' : '' }}>Tahun</option>
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
                @foreach($our_collections as $our_collection)
                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="position-relative">
                            <a href="{{ route('landing.show-collection-detail', $our_collection->slug) }}">
                                <div class="card">
                                    <figure class="card-img-top">
                                        @if(file_exists(public_path($our_collection->banner_path)))
                                            <img class="img-fluid" src="{{ asset($our_collection->banner_path) }}" alt="{{ $our_collection->nama }}" />
                                        @else
                                            <div style="width: 100%; height: 180px; background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%); background-size: 200% 100%; animation: loading 1.5s infinite; border-radius: 8px;"></div>
                                        @endif
                                    </figure>
                                    <div class="card-body px-6 py-5">
                                        <h4 class="mb-1">{{ $our_collection->nama }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    {{ $our_collections->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
