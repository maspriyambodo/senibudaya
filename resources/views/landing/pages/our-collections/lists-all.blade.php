@extends('landing.layouts.master')
@section('title', 'Hasil Pencarian \'' . request()->query('q') . '\'')
@section('content')
    <section class="wrapper bg-gray">
        <div class="container py-3 py-md-5">
            <nav class="d-inline-block" aria-label="breadcrumb">
              <h1>Hasil Pencarian '{{ request()->query('q') }}'</h1>
            </nav>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container py-md-16">
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