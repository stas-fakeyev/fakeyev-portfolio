@extends('layout.site', ['title' => __('posts/pages.section_title')])

@section('content')
        <!-- Page Title -->
		<x-breadcrumbs>
{{ __('posts/pages.section_title') }}
</x-breadcrumbs>

        <!-- Posts List -->
        <div class="section blog-posts-wrapper">
	    	<div class="container">
				<div class="row">
				@if (count($posts) > 0)
					<!-- Post -->
				@foreach ($posts as $post)
					<div class="col-md-4 col-sm-6">
						<div class="blog-post">
							<!-- Post Info -->
							<div class="post-info">
								<div class="post-date">
									<div class="date">{{ $post->created_at->format('d M, Y') }}</div>
								</div>
								<div class="post-comments-count">
									<a href="{{ route('posts.show', ['post' => $post->slug]) }}" title="Show Comments"><i class="glyphicon glyphicon-comment icon-white"></i>{{ count($post->comments) }}</a>
								</div>
							</div>
							<!-- End Post Info -->
							<!-- Post Image -->
							@php
							if ($post->image){
							$url = Storage::disk('public')->url('posts/thumb/'.$post->image);
							}
							else{
								$url = Storage::disk('public')->url('posts/default.png');
							}
							@endphp
							<a href="{{ route('posts.show', ['post' => $post->slug]) }}"><img src="{{ $url }}" class="post-image" alt="{{ $url }}"></a>
							<!-- End Post Image -->
							<!-- Post Title & Summary -->
							<div class="post-title">
								<h3><a href="{{ route('posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h3>
							</div>
							<div class="post-summary">
								<p>{{ Str::limit($post->text, 100) }}</p>
							</div>
							<!-- End Post Title & Summary -->
							<div class="post-more">
								<a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="btn btn-small">{{ __('posts/pages.read-more') }}</a>
							</div>
						</div>
					</div>
					<!-- End Post -->
					@endforeach
					@endif
				</div>
			</div>
	    </div>
	    <!-- End Posts List -->

@endsection