@extends('layout.admin', ['title' => __('posts/categories.section_title')])

@section('content')
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                        <div class="recent-post-ctn">
                            <div class="recent-post-title">
                                <h2>{{ __('categories/pages.section_title') }}</h2>
                            </div>
                        </div>
                        <div class="recent-post-items">
						@if (count($totalcategories) > 0)
							@foreach ($totalcategories as $totalcategory)
						@php
						$category = $totalcategory->categories->first();
						@endphp
						@isset($category)
                            <div class="recent-post-signle">
                                    <div class="recent-post-flex rct-pt-mg">
                                        <div class="recent-post-it-ctn">
                                            <h2><a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">{{ $category->title }}</a></h2>
											<form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST">
											@csrf
											@method('DELETE')
											                            <button class="btn btn-primary btn-md hec-button">{{ __('categories/pages.delete') }}</button>
																		</form>
                                        </div>
                                    </div>
                            </div>
							@endisset
							@endforeach
							@else
								<p>no found categories!</p>
							@endif
                        </div><!-- end items -->
                    </div><!-- end wrapper -->
                </div><!-- end col -->
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
@endsection