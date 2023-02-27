@extends('layout.admin', ['title' => __('posts/pages.title_edit')])

@section('content')
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="form-element-list">
									                        <div class="basic-tb-hd">
															@php
$langs = [];
@endphp
@isset($translates)
@foreach($translates as $translate)
@php
$langs[] = $translate->language;
@endphp
@endforeach
<ul>
@foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
@if(!in_array($lang, $langs) && $lang !== LaravelLocalization::getCurrentLocale() && $lang !== $language)
<li><a href="{{ route('admin.posts.create', ['totalpost' => $post->totalpost_id, 'language' => $lang]) }}">{{ __('posts/pages.translate') }} ({{ $lang }})</a></li>
@endif
@endforeach
</ul>
@endisset

                            <h2>{{ __('posts/pages.title_edit') }}</h2>
                            <p>{{ __('posts/pages.text_edit') }}</p>
														<p>{{ __('posts/pages.language') }}: {{ $language }}</p>
                        </div>
<form method="post" action="{{ route('admin.posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.posts.template-parts.form')
</form>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection