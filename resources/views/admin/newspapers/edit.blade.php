@extends('layout.admin', ['title' => __('newspapers/pages.title_edit')])

@section('content')
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="form-element-list">
									                        <div class="basic-tb-hd">
                            <h2>{{ __('newspapers/pages.title_edit') }}</h2>
                            <p>{{ __('newspapers/pages.text_edit') }}</p>
                        </div>
<form method="post" action="{{ route('admin.newspapers.update', ['newspaper' => $newspaper->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.newspapers.template-parts.form')
</form>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection