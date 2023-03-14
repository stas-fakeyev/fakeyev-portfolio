@csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $newspaper->title ?? '' }}" placeholder="{{ __('newspapers/form.title') }}" maxlength="60">
										@error('title')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="url" value="{{ old('url') ?? $newspaper->url ?? '' }}" placeholder="{{ __('newspapers/form.url') }}" maxlength="100">
										@error('url')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
</div><!-- end row -->
<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success btn-sm hec-save">{{ __('newspapers/form.save') }}</button>
</div>
</div><!-- end row -->