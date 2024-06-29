@include('header')
	<!-- Start Post Single Wrapper  -->
		<div class="post-single-wrapper axil-section-gap bg-color-white">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<ul class="post-meta-list">
							@isset($detail->nama_direktorat)
								<li>
									<a href="{{ url('direktorat').'/'.slug($detail->nama_direktorat) }}">
										{{ $detail->nama_direktorat }}
									</a>
								</li>
							@endif
							@if(strtolower($kategori) == 'konsultasi')
								<li>
									{{ $detail->{'nama_'.strtolower($kategori)} }}
								</li>
								<li>
									{{ $detail->{'kota_'.strtolower($kategori)} }}
								</li>
							@else
								<li>
									{{ date('d M Y H:i', strtotime($detail->created_at)) }}
								</li>
							@endif
						</ul>
						<p class="has-medium-font-size">
							@if(strtolower($kategori) == 'konsultasi')
								{{ $detail->{'judul_'.strtolower($kategori)} }}
							@else
								{{ $detail->{'nama_'.strtolower($kategori)} }}
							@endif
						</p>
						
						@if($detail->{'image_'.strtolower($kategori)})
						<figure class="wp-block-image">
							<img src="{{ asset('images/'.strtolower($kategori)).'/'.$detail->{'image_'.strtolower($kategori)} }}" alt="{{ $detail->{'nama_'.strtolower($kategori)} }}">
						</figure>
						@endif
						
						@if(strtolower($kategori) == 'konsultasi')
							<small>
							{!! nl2br($detail->{'detail_'.strtolower($kategori)}) !!}
							</small>
							<div class="axil-single-widget widget widget_archive mt--30">
							{!! $detail->{'jawab_'.strtolower($kategori)} !!}
							</div>
						@else
							{!! $detail->{'detail_'.strtolower($kategori)} !!}
						@endif
						
						<div class="row mt--20 mb--20">
						@isset($detail->nama_sumber)
							<div class="col-md-4">
								Jurnalis: <a href="{{ url('jurnalis').'/'.slug($detail->nama_sumber) }}"> {{ $detail->nama_sumber }}</a>
							</div>
						@endisset
						@isset($detail->nama_editor)
							<div class="col-md-4">
								Editor : <a href="{{ url('editor').'/'.slug($detail->nama_editor) }}"> {{ $detail->nama_editor }}</a>
							</div>
						@endisset
						@isset($detail->nama_fg)
							<div class="col-md-4">
								Fotografer : <a href="{{ url('fotografer').'/'.slug($detail->nama_fg) }}"> {{ $detail->nama_fg }}</a>
							</div>
						@endisset
						</div>
						
						@if(strtolower($kategori) == 'konsultasi')
							@if(isset($prev) || isset($next))
								<div class="row">
									<div class="col-lg-6 text-start">
										@if(isset($prev))
											<!-- Start Single Post  -->
											<div class="post-medium-block">
												<div class="content-block post-medium mb--20">
													<div class="post-content">
														<small><i class="fas fa-caret-left"></i> Sebelumnya</small>
														<h6 class="title"><a href="{{ url($current).'/'.getLink($prev->{'judul_'.strtolower($kategori)}.' '.$prev->{'nama_'.strtolower($kategori)}.' '.$prev->{'kota_'.strtolower($kategori)}) }}">{{ $prev->{'judul_'.strtolower($kategori)} }}</a></h6>
														<small>{{ $prev->{'nama_'.strtolower($kategori)} }}, {{ $prev->{'kota_'.strtolower($kategori)} }}</small>
													</div>
												</div>
											</div>
											<!-- End Single Post  -->
										@endif
									</div>
									<div class="col-lg-6 text-end">
										@if(isset($next))
											<!-- Start Single Post  -->
											<div class="post-medium-block">
												<div class="content-block post-medium mb--20">
													<div class="post-thumbnail">
													</div>
													<div class="post-content">
														<small>Selanjutnya <i class="fas fa-caret-right"></i></li></small>
														<h6 class="title"><a href="{{ url($current).'/'.getLink($next->{'judul_'.strtolower($kategori)}.' '.$next->{'nama_'.strtolower($kategori)}.' '.$next->{'kota_'.strtolower($kategori)}) }}">{{ $next->{'judul_'.strtolower($kategori)} }}</a></h6>
														<small>{{ $next->{'nama_'.strtolower($kategori)} }}, {{ $next->{'kota_'.strtolower($kategori)} }}</small>
													</div>
												</div>
											</div>
											<!-- End Single Post  -->
										@endif
									</div>
								</div>
							@endif
						@else
							<div class="social-share-block mb--30">
								<ul class="social-icon icon-rounded-transparent md-size">
									<li>Share :</li>
									<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url($current.'/'.$detail->{'slug_'.strtolower($kategori)}) }}" target="blank"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="https://twitter.com/intent/tweet?url={{ url($current.'/'.$detail->{'slug_'.strtolower($kategori)}) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
									<li><a href="https://wa.me/?text={{ url($current.'/'.$detail->{'slug_'.strtolower($kategori)}) }}" target="blank"><i class="fab fa-whatsapp"></i></a></li>
								</ul>
							</div>
							
							@if(isset($prev) || isset($next))
								<div class="row">
									<div class="col-lg-6 text-start">
										@if(isset($prev))
											<!-- Start Single Post  -->
											<div class="post-medium-block">
												<div class="content-block post-medium mb--20">
													<div class="post-thumbnail">
														<div class="post-thumbnail-image">
															<a href="{{ url($current).'/'.$prev->{'slug_'.strtolower($kategori)} }}">
																<img src="{{ asset('images/'.strtolower($kategori)).'/'.$prev->{'image_'.strtolower($kategori)} }}" >
															</a>
														</div>
													</div>
													<div class="post-content">
														<small><i class="fas fa-caret-left"></i> Sebelumnya</small>
														<h6 class="title"><a href="{{ url($current).'/'.$prev->{'slug_'.strtolower($kategori)} }}">{{ $prev->{'nama_'.strtolower($kategori)} }}</a></h6>
													</div>
												</div>
											</div>
											<!-- End Single Post  -->
										@endif
									</div>
									<div class="col-lg-6 text-end">
										@if(isset($next))
											<!-- Start Single Post  -->
											<div class="post-medium-block">
												<div class="content-block post-medium mb--20">
													<div class="post-content mr--10">
														<small>Selanjutnya <i class="fas fa-caret-right"></i></li></small>
														<h6 class="title"><a href="{{ url($current).'/'.$next->{'slug_'.strtolower($kategori)} }}">{{ $next->{'nama_'.strtolower($kategori)} }}</a></h6>
													</div>
													<div class="post-thumbnail">
														<div class="post-thumbnail-image">
															<a href="{{ url($current).'/'.$next->{'slug_'.strtolower($kategori)} }}">
																<img src="{{ asset('images/'.strtolower($kategori)).'/'.$next->{'image_'.strtolower($kategori)} }}" >
															</a>
														</div>
													</div>
												</div>
											</div>
											<!-- End Single Post  -->
										@endif
									</div>
								</div>
							@endif
						@endif
						
					</div>
					<div class="col-lg-4">
						@if(strtolower($kategori) == 'konsultasi')
							<!-- Start Single Widget  -->
							<div class="axil-single-widget widget widget_archive mb--30">
								<h5 class="widget-title">{{ $parent }}</h5>
								<!-- Start Post List  -->
								<ul>
									@foreach($jenis as $i => $nama_jenis)
									<li><a href="{{ url($current.'/default/'.$i) }}" >{{ $nama_jenis}}</a></li>
									@endforeach
								</ul>
								<!-- End Post List  -->
							</div>
							<!-- End Single Widget  -->
						@endif
						
						<!-- Start Single Widget  -->
						<div class="axil-single-widget widget widget_postlist mb--30">
							<h5 class="widget-title">{{ strtolower($kategori) == 'berita' ? 'Opini' : 'Berita Terkini' }}</h5>
							<!-- Start Post List  -->
							<div class="post-medium-block">
								@foreach($left as $l)
								<!-- Start Single Post  -->
								<div class="content-block post-medium mb--20">
									<div class="post-thumbnail">
										<div class="post-thumbnail-image">
											<a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">
												<img src="{{ asset('images/'.(strtolower($kategori) == 'berita' ? 'opini' : 'berita')).'/'.$l->{'image_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}" >
											</a>
										</div>
									</div>
									<div class="post-content">
										<h6 class="title"><a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">{{ $l->{'nama_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}</a></h6>
										<div class="post-meta">
											<ul class="post-meta-list">
												<li>{{ date('d M Y H:i', strtotime($l->created_at)); }}</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- End Single Post  -->
								@endforeach
							</div>
							<!-- End Post List  -->
						</div>
						<!-- End Single Widget  -->
					</div>
				</div>
			</div>
		</div>
	<!-- End Post Single Wrapper  -->
@include('footer')