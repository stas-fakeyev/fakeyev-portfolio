@csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $post->title ?? '' }}" placeholder="{{ __('posts/form.title') }}" maxlength="60">
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
                                        <input type="text" class="form-control" name="slug" value="{{ old('slug') ?? $post->slug ?? '' }}" placeholder="{{ __('posts/form.slug') }}" maxlength="100">
										@error('slug')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
							                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
																		                                    <h2>{{ __('posts/form.image') }}</h2>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="file" class="form-control" name="image">
										@error('image')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
							</div><!-- end row -->
<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
									                                    <h2>{{ __('posts/form.text') }}</h2>
                                    </div>
                                    <div class="nk-int-st">
									<input type="textarea" class="form-control" name="text" value="{!! old('text') ?? $post->text ?? '' !!}"></textarea>
									@error('text')
									<p>{{ $message }}</p>
									@enderror
                                    </div>
                                </div>
</div>
</div><!-- end row -->
<div class="row">	
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
																		                                    <h2>{{ __('posts/form.category') }}</h2>
                                    </div>
									                                <div class="bootstrap-select fm-cmp-mg">
																	@php
																	$cat_id = 0;
																	@endphp
																@if (isset($post) && count($post->categories) > 0)
																	@foreach ($post->categories as $cat)
																@if ($loop->count == 1)
																	@php
																	$cat_id = $cat->id;
																	@endphp
																@else
																	@if ($loop->last)
																		@php
																		$cat_id = $cat->id;
																		@endphp
																	@endif
																@endif
																		@endforeach
																		@endif
                                    <select class="selectpicker" name="category_id">
																										@if (count($categories) > 0)
																		@foreach($categories as $category)
<option value="{{ $category->id }}"
@php
if ($cat_id == $category->id) echo' selected';
elseif (old('category_id') == $category->id) echo' selected';
@endphp
>{{ $category->title }}</option>
																															@endforeach
																																																		@endif
										</select>
										@error('category_id')
										<p>{{ $message }}</p>
										@enderror
                                </div>
                                </div>

							<input type="hidden" name="language" value="{{ old('language') ?? $language ?? LaravelLocalization::getCurrentLocale() }}" />
									@error('language')
									<p>{{ $message }}</p>
									@enderror

                            <button type="submit" class="btn btn-success btn-sm hec-save">{{ __('posts/form.save') }}</button>
</div>
</div><!-- end row -->