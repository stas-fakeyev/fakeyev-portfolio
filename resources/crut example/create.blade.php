@extends('layout.admin', ['title' => __('home-slider/pages.title_create')])

@section('content')
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="form-element-list">
									                        <div class="basic-tb-hd">
                            <h2>{{ __('home-slider/pages.title_create') }}</h2>
                            <p>{{ __('home-slider/pages.text_create') }}</p>
                        </div>
    <form method="post" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
        @include('admin.sliders.template-parts.form')
    </form>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection