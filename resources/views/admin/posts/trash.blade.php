@extends('layout.admin', ['title' => __('posts/pages.section_trash')])

@section('content')
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="recent-post-ctn">
                            <div class="recent-post-title">
                                <h2>{{ __('posts/pages.section_trash') }}</h2>
                            </div>
                        </div>
                        <div class="recent-post-items">
						@if (count($totalposts) > 0)
							@foreach ($totalposts as $totalpost)
						@php
						$post = $totalpost->posts->first();
						@endphp
						@isset($post)
                            <div class="recent-post-signle">
                                    <div class="recent-post-flex rct-pt-mg">
                                        <div class="recent-post-img">
										@php
										if (isset($post->image)){
										$url = Storage::disk('public')->url('posts/source/' . $post->image);
									}
									else{
																				$url = Storage::disk('public')->url('posts/source/default.png');
									}
									@endphp
                                            <img src="{{ $url }}" alt="{{ $url }}" />
                                        </div>
                                        <div class="recent-post-it-ctn">
                                            <h2>{{ $post->title }}</a></h2>
																						<form action="{{ route('admin.posts.restore', ['totalpost' => $totalpost->id]) }}" method="POST">
											@csrf
											@method('POST')
											                            <button class="btn btn-primary btn-md hec-button">{{ __('posts/pages.restore') }}</button>
																		</form>

											<form action="{{ route('admin.posts.force-delete', ['totalpost' => $totalpost->id]) }}" method="POST">
											@csrf
											@method('DELETE')
											                            <button class="btn btn-primary btn-md hec-button">{{ __('posts/pages.force-delete') }}</button>
																		</form>
                                        </div>
                                    </div>
                            </div>
							@endisset
							@endforeach
							@else
								<p>no found posts!</p>
							@endif
                        </div><!-- end items -->
                    </div><!-- end wrapper -->
                </div><!-- end col -->
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
@endsection