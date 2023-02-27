@csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $slider->title ?? '' }}" placeholder="{{ __('home-slider/form.title') }}" maxlength="60">
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
                                        <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') ?? $slider->subtitle ?? '' }}" placeholder="{{ __('home-slider/form.subtitle') }}" maxlength="100">
										@error('subtitle')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <h2>{{ __('home-slider/form.choose_language') }}</h2>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
																@if (count(LaravelLocalization::getLocalesOrder()) > 0)
                                    <select class="selectpicker" name="language">
																		@foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
									@php
									$flag = 'img/flags/'.$properties['flag'];
									@endphp
<option value="{{ $localeCode }}" 
@if (isset($slider->language) && $slider->language === $localeCode)
	selected="selected"
elseif ($localeCode === LaravelLocalization::getCurrentLocale())
 selected="selected"
@endif
>{{ $localeCode }}</option>
																															@endforeach
										</select>
										@error('language')
										<p>{{ $message }}</p>
										@enderror
																			@endif

                                </div>
                            </div>
</div><!-- end row -->
<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
									                                    <h2>{{ __('home-slider/form.upload_background') }}</h2>
                                    </div>
                                    <div class="nk-int-st">
									<input type="file" class="form-control" name="background">
									@error('background')
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
									                                    <h2>{{ __('home-slider/form.upload_slide') }}</h2>
                                    </div>
                                    <div class="nk-int-st">
									<input type="file" class="form-control" name="slide">
																		@error('slide')
									<p>{{ $message }}</p>
									@enderror
                                    </div>
                                </div>
</div>
</div><!-- end row -->
<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success btn-sm hec-save">{{ __('home-slider/form.save') }}</button>
</div>
</div><!-- end row -->