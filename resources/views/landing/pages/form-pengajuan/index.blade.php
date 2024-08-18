@extends('landing.layouts.master')
@section('title', 'List Pengajuan')
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <h1 class="display-1 mb-5">List Pengajuan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="job-list mt-n17">
                        @foreach($pengajuans as $pengajuan)
                            <div class="card shadow-lg card-border-top border-{{ $pengajuan->status_approval == 0 ? 'red' : ($pengajuan->status_approval == 1 ? 'yellow' : 'green') }} mb-4 lift">
                                <div class="card-body p-5">
                                    <span class="row justify-content-between align-items-center">
                                      <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                                          {{ $pengajuan->nama }}
                                      </span>
                                      <span class="col-5 col-md-3 text-body d-flex align-items-center"><i class="uil uil-calendar-alt me-1"></i> {{ $pengajuan->created_at->format('F d, Y') }}</span>
                                      <span class="col-7 col-md-4 col-lg-3 text-body d-flex align-items-center"><i class="uil uil-exclamation-circle me-1"></i>
                                        @if($pengajuan->status_approval == 0)
                                          Ditolak
                                        @elseif($pengajuan->status_approval == 1)
                                          Menunggu Persetujuan
                                        @elseif($pengajuan->status_approval == 2)
                                          Disetujui
                                        @endif
                                      </span>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-10 mx-auto">
                    {{ $pengajuans->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection