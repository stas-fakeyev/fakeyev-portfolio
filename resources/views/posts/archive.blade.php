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
								@if ($posts->count() > 0)
				@include('posts.template-parts.loop', ['posts' => $posts])
			@else
				<p>No posts</p>
			@endif
				</div>
			</div>
	    </div>
	    <!-- End Posts List -->

@endsection