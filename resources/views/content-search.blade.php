@include('header')
	<!-- Start Post Single Wrapper  -->
	<div class="post-single-wrapper axil-section-gap bg-color-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="axil-post-details mb--30">
						<p class="has-medium-font-size">Pencarian</p>
					</div>
					
					<form class="custom-form"  action="{{ url('/search') }}" method="post" />
					@csrf
					<div class="row">
						<div class="col-md-5">
							<input id="keyword" name="keyword" type="text" required="" value="{{ $keyword }}" placeholder="Pencarian..." value="" minlength="3" />
						</div>
						<div class="col-md-3">
							<button id="search" name="search" type="submit" id="submit" class="axil-button button-rounded">Cari</button>
						</div>
					</div>
					</form>
					
					<!-- START BERITA -->
					@if(count($berita))
						<div class="section-title mt--20">
							<h6 class="title">BERITA</h6>
						</div>
						@foreach($berita as $i => $b)
							<!-- Start Post List  -->
							<div class="content-block post-list-view mt--10">
								<div class="post-content">
									@isset($direktorat[$b->kategori_direktorat])
									<div class="post-cat">
										<div class="post-cat-list">
											<a class="hover-flip-item-wrapper" href="{{ url('direktorat').'/'.slug($direktorat[$b->kategori_direktorat]) }}">
												<span data-text="{{ $direktorat[$b->kategori_direktorat] }}">{{ $direktorat[$b->kategori_direktorat] }}</span>
											</a>
										</div>
									</div>
									@endisset
									<h6 class="title mb--10">
										<a href="{{ url($current).'/'.$b->slug_berita }}">{{ $b->nama_berita }}</a>
									</h6>
									<ul class="post-meta-list">
										<li>{{ date('d M Y H:i', strtotime($b->created_at)) }}</li>
									</ul>
								</div>
							</div>
							<!-- End Post List  -->
						@endforeach
					@endif
					<!-- END BERITA -->
					
					
					<!-- START OPINI -->
					@if(count($opini))
						<div class="section-title mt--20">
							<h6 class="title">OPINI</h6>
						</div>
						@foreach($opini as $i => $o)
							<!-- Start Post List  -->
							<div class="content-block post-list-view mt--10">
								<div class="post-content">
									<h6 class="title mb--10">
										<a href="{{ url($current).'/'.$o->slug_opini }}">{{ $o->nama_opini }}</a>
									</h6>
									<ul class="post-meta-list">
										<li>{{ date('d M Y H:i', strtotime($o->created_at)) }}</li>
									</ul>
								</div>
							</div>
							<!-- End Post List  -->
						@endforeach
					@endif
					<!-- END OPINI -->
					
					<!-- START TOKOH -->
					@if(count($tokoh))
						<div class="section-title mt--20">
							<h6 class="title">TOKOH</h6>
						</div>
						@foreach($tokoh as $i => $t)
							<!-- Start Post List  -->
							<div class="content-block post-list-view mt--30">
								<div class="post-content">
									<h6 class="title mb--10">
										<a href="{{ url($current).'/'.$t->slug_tokoh }}">{{ $t->nama_tokoh }}</a>
									</h6>
									<small>{{ trunc(clean($t->keterangan_tokoh),15) }} ...</small>
									<ul class="post-meta-list">
										<li>{{ date('d M Y H:i', strtotime($t->created_at)) }}</li>
									</ul>
								</div>
							</div>
							<!-- End Post List  -->
						@endforeach
					@endif
					<!-- END TOKOH -->
					
					<!-- START BIMBINGAN -->
					@if(count($bimbingan))
						<div class="section-title mt--20">
							<h6 class="title">BIMBINGAN</h6>
						</div>
						@foreach($bimbingan as $i => $b)
							<!-- Start Post List  -->
							<div class="content-block post-list-view mt--30">
								<div class="post-content">
									<h6 class="title mb--10">
										<a href="{{ url($current).'/'.$b->slug_bimbingan }}">{{ $b->nama_bimbingan }}</a>
									</h6>
									<small>{{ trunc(clean($b->keterangan_bimbingan),15) }} ...</small>
									<ul class="post-meta-list">
										<li>{{ date('d M Y H:i', strtotime($b->created_at)) }}</li>
									</ul>
								</div>
							</div>
							<!-- End Post List  -->
						@endforeach
					@endif
					<!-- END BIMBINGAN -->
					
					<br clear="all">
					{{ $berita->links("pagination::bootstrap-4") }}
					
				</div>
				<div class="col-lg-4">
					<!-- Start Sidebar Area  -->
					<div class="sidebar-inner">
						<!-- Start Single Widget  -->
						<div class="axil-single-widget widget widget_postlist mb--30">
							<h5 class="widget-title">Opini</h5>
							<!-- Start Post List  -->
							<div class="post-medium-block">
								@foreach($left as $l)
								<!-- Start Single Post  -->
								<div class="content-block post-medium mb--20">
									<div class="post-thumbnail">
										<div class="post-thumbnail-image">
											<a href="{{ url('opini').'/'.$l->slug_opini }}">
												<img src="{{ asset('images/opini').'/'.$l->image_opini }}" >
											</a>
										</div>
									</div>
									<div class="post-content">
										<h6 class="title"><a href="{{ url('opini').'/'.$l->slug_opini }}">{{ $l->nama_opini }}</a></h6>
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
					<!-- End Sidebar Area  -->
					
					<!-- Start Sidebar Area  -->
					<div class="sidebar-inner">
						<!-- Start Single Widget  -->
						<div class="axil-single-widget widget widget_postlist mb--30">
							<h5 class="widget-title">Tokoh</h5>
							<!-- Start Post List  -->
							<div class="post-medium-block">
								@foreach($right as $r)
								<!-- Start Single Post  -->
								<div class="content-block post-medium mb--20">
									<div class="post-thumbnail">
										<div class="post-thumbnail-image">
											<a href="{{ url('tokoh').'/'.$r->slug_tokoh }}">
												<img src="{{ asset('images/tokoh').'/'.$r->image_tokoh }}" >
											</a>
										</div>
									</div>
									<div class="post-content">
										<h6 class="title"><a href="{{ url('tokoh').'/'.$r->slug_tokoh }}">{{ $r->nama_tokoh }}</a></h6>
										<div class="post-meta">
											<ul class="post-meta-list">
												<li>{{ date('d M Y H:i', strtotime($r->created_at)); }}</li>
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
					<!-- End Sidebar Area  -->
				</div>
			</div>
		</div>
	</div>

@include('footer')