@extends('layout.admin', ['title' => __('categories/pages.title_edit')])

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
<li><a href="{{ route('admin.categories.create', ['totalcategory' => $category->totalcategory_id, 'language' => $lang]) }}">{{ __('categories/pages.translate') }} ({{ $lang }})</a></li>
@endif
@endforeach
</ul>
@endisset

                            <h2>{{ __('categories/pages.title_edit') }}</h2>
                            <p>{{ __('categories/pages.text_edit') }}</p>
														<p>{{ __('categories/pages.language') }}: {{ $language }}</p>
                        </div>
<form method="post" action="{{ route('admin.categories.update', ['category' => $category->id]) }}">
    @method('PUT')
    @include('admin.categories.template-parts.form')
</form>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection