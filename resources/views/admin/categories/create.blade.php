@extends('layout.admin', ['title' => __('categories/pages.title_create')])

@section('content')
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="form-element-list">
									                        <div class="basic-tb-hd">
                            <h2>{{ __('categories/pages.title_create') }}</h2>
                            <p>{{ __('categories/pages.text_create') }}</p>
							<p>{{ __('categories/pages.language') }}: {{ $language }}</p>
                        </div>
						@if (!is_null($totalcategory))
    <form method="post" action="{{ route('admin.categories.store', ['totalcategory' => $totalcategory->id]) }}">
@else
	    <form method="post" action="{{ route('admin.categories.store') }}">
@endif
        @include('admin.categories.template-parts.form')
    </form>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection