@csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="login" value="{{ old('login') ?? $user->login ?? '' }}" placeholder="{{ __('users/form.login') }}" maxlength="60">
										@error('login')
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
                                        <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name ?? '' }}" placeholder="{{ __('users/form.name') }}" maxlength="50">
										@error('name')
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
                                        <input type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email ?? '' }}" placeholder="{{ __('users/form.email') }}" maxlength="50">
										@error('email')
										<p>{{ $message }}</p>
										@enderror
                                    </div>
                                </div>
                            </div>
							</div><!-- end row -->
							<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <h2>{{ __('users/form.role') }}</h2>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
																@if (count($roles) > 0)
                                    <select class="selectpicker" name="role_id">
																		@foreach($roles as $role)
																	<option 
																	@isset($user->role->id)
																	@if ($user->role->id === $role->id)
																		selected="selected"
																	@endif
																	@endisset
																	value="{{ $role->id }}" 
>{{ __('users/form.'.$role->name) }}</option>
																															@endforeach
										</select>
										@error('role_id')
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
									                                    <h2>{{ __('users/form.avatar') }}</h2>
                                    </div>
                                    <div class="nk-int-st">
									<input type="file" class="form-control" name="avatar">
									@error('avatar')
									<p>{{ $message }}</p>
									@enderror
                                    </div>
                                </div>
</div>
</div><!-- end row -->
<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success btn-sm hec-save">{{ __('users/form.save') }}</button>
</div>
</div><!-- end row -->