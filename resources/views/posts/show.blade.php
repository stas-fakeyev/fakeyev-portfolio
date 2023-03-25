@extends('layout.site', ['title' => $post->title])

@section('content')
        <!-- Page Title -->
		<x-breadcrumbs>
{{ $post->title }}
</x-breadcrumbs>

       
        <div class="section">
	    	<div class="container">
				<div class="row">
					<!-- Blog Post -->
					<div class="col-sm-8">
						<div class="blog-post blog-single-post">
							<div class="single-post-title">
								<h3>{{ $post->title }}</h3>
							</div>
							<div class="single-post-info">
								<i class="glyphicon glyphicon-time"></i>{{ $post->created_at->format('d M, Y') }} <a href="javascript:void(0)" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>{{ count($post->comments) }}</a>
							</div>
							<div class="single-post-image">
							@php
							if ($post->image){
								$url = Storage::disk('public')->url('posts/source/'.$post->image);
							}
							else{
								$url = Storage::disk('public')->url('posts/default.png');
							}
							@endphp
								<img src="{{ $url }}" alt="{{ $url }}">
							</div>
							<div class="single-post-content">
							{!! $post->text !!}
							</div>
							<!-- Comments -->
							<div class="post-coments">
								<h4>{{ __('comments/pages.comments') }} ({{ count($post->comments) }})</h4>
								@if ($comments)
								<ul class="post-comments">
							@include('posts.comment', ['comments' => $comments])
								</ul>
								<!-- Pagination -->
								<div class="pagination-wrapper ">
								@include('posts.pagination', ['comments' => $comments, 'post' => $post])
								</div>
								@endif
								<!-- Comments Form -->
								<h4>{{ __('comments/pages.leave') }}</h4>
								<div class="comment-form-wrapper">
									<form class="comment-form" action="{{ route('comments.store') }}" method="POST">
									@method('POST')
									@csrf
									@if (!Auth::check())
				        				<div class="form-group">
				        				 	<label for="comment-name"><i class="glyphicon glyphicon-user"></i> <b>{{ __('comments/form.name') }}</b></label>
											<input class="form-control" id="comment-name" type="text" name="name" placeholder="">
											@error('name')
											<p>{{ $message }}</p>
											@enderror
										</div>
										<div class="form-group">
											<label for="comment-email"><i class="glyphicon glyphicon-envelope"></i> <b>{{ __('comments/form.email') }}</b></label>
											<input class="form-control" id="comment-email" type="text" name="email" placeholder="">
																						@error('email')
											<p>{{ $message }}</p>
											@enderror
										</div>
										@endif
										<div class="form-group">
											<label for="comment-message"><i class="glyphicon glyphicon-comment"></i> <b>{{ __('comments/form.text') }}</b></label>
											<textarea class="form-control" rows="5" id="comment-message" name="text"></textarea>
																						@error('text')
											<p>{{ $message }}</p>
											@enderror
										</div>
										<div class="form-group">
														                        	<input id="comment_post_ID" type="hidden" name="commentable_id" value="{{ $post->id }}" />
																					<input type="hidden" name="commentable_type" value="posts" />
				                        	<input id="comment_parent" type="hidden" name="parent_id" value="0" />
											@error('commentable_id')
											<p>{{ $message }}</p>
											@enderror
																						@error('commentable_type')
											<p>{{ $message }}</p>
											@enderror
											@error('parent_id')
											<p>{{ $message }}</p>
											@enderror
											<button type="submit" class="btn btn-large pull-right">{{ __('comments/form.send') }}</button>
										</div>
										<div class="clearfix"></div>
				        			</form>
								</div>
								<!-- End Comment Form -->
							</div>
							<!-- End Comments -->
						</div>
					</div>
					<!-- End Blog Post -->
					<!-- Sidebar -->
					<div class="col-sm-4 blog-sidebar">
						<h4>Search our Blog</h4>
						<form action="{{ route('search') }}" method="GET">
							<div class="input-group">
								<input class="form-control input-md" id="appendedInputButtons" type="text" name="query">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-md">Search</button>
								</span>
							</div>
						</form>
						@if (count($recentPosts) > 0)
						<h4>Recent Posts</h4>
						<ul class="recent-posts">
						@foreach ($recentPosts as $recentPost)
							<li><a href="{{ route('posts.show', ['post' => $recentPost->slug]) }}">{{ $recentPost->title }}</a></li>
							@endforeach
						</ul>
						@endif
						@if (count($categories) > 0)
						<h4>{{ __('categories/pages.section_title') }}</h4>
						<ul class="blog-categories">
						@foreach ($categories as $category)
						@if ($category->posts_count > 0)
							<li><a href="{{ route('posts.category', ['category' => $category->slug]) }}">{{ $category->title }}</a></li>
						@endif
							@endforeach
						</ul>
						@endif
						@if (count($archivePosts) > 0)
						<h4>Archive</h4>
						<ul>
						@foreach ($archivePosts as $archivePost)
						@if (isset($archivePost->month) && isset($archivePost->year))
							<li><a href="{{ route('posts.archive', ['month' => $archivePost->month, 'year' => $archivePost->year]) }}">{{ $archivePost->month_name }} {{ $archivePost->year }}</a></li>
						@endif
							@endforeach
						</ul>
						@endif
					</div>
					<!-- End Sidebar -->
				</div>
			</div>
	    </div>
@push('scripts')
        <script src="{{ asset('js/comment.js') }}"></script>
@endpush
@endsection
