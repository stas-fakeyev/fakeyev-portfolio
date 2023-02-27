@csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $category->title ?? '' }}" placeholder="{{ __('categories/form.title') }}" maxlength="60">
										@error('title')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="slug" value="{{ old('slug') ?? $category->slug ?? '' }}" placeholder="{{ __('categories/form.slug') }}" maxlength="70">
										@error('slug')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
							                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
																		                                    <h2>{{ __('categories/form.parent-category') }}</h2>
                                    </div>
									                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="parent_id">
									<option value="0">{{ __('categories/form.without-parent') }}</option>
																										@if (count($categories) > 0)
																		@foreach($categories as $parentCategory)
<option value="{{ $parentCategory->id }}" 
@if (isset($category->parent_id) && $category->parent_id === $parentCategory->id)
 selected="selected"
elseif (old('parent_id'))
 selected="selected"
@endif
>{{ $parentCategory->title }}</option>
																															@endforeach
																																																		@endif
										</select>
										@error('parent_id')
										<p>{{ $message }}</p>
										@enderror
                                </div>
                                </div>
                            </div>
							</div><!-- end row -->
<div class="row">	
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="hidden" name="language" value="{{ old('language') ?? $language ?? LaravelLocalization::getCurrentLocale() }}" />
									@error('language')
									<p>{{ $message }}</p>
									@enderror

                            <button type="submit" class="btn btn-success btn-sm hec-save">{{ __('categories/form.save') }}</button>
</div>
</div><!-- end row -->