@extends('layout.site', ['title' => __('auth.login')])

@section('content')
<x-breadcrumbs>
{{ __('auth.login') }}
</x-breadcrumbs>        

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
							<form method="POST" action="{{ route('login') }}" role="form">
							@csrf
							            <!-- login or Email Address -->

								<div class="form-group">
								                <x-input-label for="login-username" :value="__('auth.user_login')">
user
</x-input-label>
									                <x-text-input id="login-username" class="form-control" type="text" name="login" :value="old('login')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
								</div>
								<div class="form-group">
																                <x-input-label for="login-password" :value="__('auth.password')">
lock
</x-input-label>
									                <x-text-input id="login-password" class="form-control" type="password" name="password" required autocomplete="current-password" />
													                <x-input-error :messages="$errors->get('password')" class="mt-2" />
								</div>
								<div class="form-group">
									<label class="checkbox">
										<input type="checkbox" name="remember"> {{ __('auth.Remember me') }}
									</label>
									@if (Route::has('password.request'))
									<a href="{{ route('password.request') }}" class="forgot-password">{{ __('auth.Forgot password?') }}</a>
								@endif
								                <x-primary-button class="btn pull-right">
                    {{ __('auth.login') }}
                </x-primary-button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div><!-- end sm 5 -->
					<div class="col-sm-7 social-login">
						<p>{{ __('auth.social-login') }}</p>
						<div class="social-login-buttons">
							<a href="#" class="btn-facebook-login">{{ __('auth.facebook-login') }}</a>
							<a href="#" class="btn-twitter-login">{{ __('auth.twitter-login') }}</a>
						</div>
						<div class="clearfix"></div>
						<div class="not-member">
							<p>{{ __('auth.Not a member?') }} <a href="{{ route('register') }}">{{ __('auth.Register here') }}</a></p>
						</div><!-- end not a member -->
					</div><!-- end social-login -->
				</div>
			</div>
		</div><!-- end section -->

@endsection