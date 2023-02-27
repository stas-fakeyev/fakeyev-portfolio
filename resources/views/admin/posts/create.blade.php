@extends('layout.admin', ['title' => __('posts/pages.title_create')])

@section('content')
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="form-element-list">
									                        <div class="basic-tb-hd">
                            <h2>{{ __('posts/pages.title_create') }}</h2>
                            <p>{{ __('posts/pages.text_create') }}</p>
							<p>{{ __('posts/pages.language') }}: {{ $language }}</p>
                        </div>
						@if (!is_null($totalpost))
    <form method="post" action="{{ route('admin.posts.store', ['totalpost' => $totalpost->id]) }}" enctype="multipart/form-data">
@else
	    <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
@endif
        @include('admin.posts.template-parts.form')
    </form>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection