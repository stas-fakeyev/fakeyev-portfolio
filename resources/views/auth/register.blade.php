@extends('layout.site', ['title' => __('auth.Register')])

@section('content')
<x-breadcrumbs>
{{ __('auth.Register') }}
</x-breadcrumbs>

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
							<form role="form" action="{{ route('register') }}" method="POST">
							@csrf
								<div class="form-group">
																                <x-input-label for="register-username" :value="__('auth.name')">
user
</x-input-label>
									                <x-text-input id="register-username" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
								</div>
																<div class="form-group">
																                <x-input-label for="register-userlogin" :value="__('auth.User login')">
user
</x-input-label>
									                <x-text-input id="register-userlogin" class="form-control" type="text" name="login" :value="old('login')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
								</div>
																<div class="form-group">
																                <x-input-label for="register-useremail" :value="__('auth.email')">
user
</x-input-label>
									                <x-text-input id="register-useremail" class="form-control" type="email" name="email" :value="old('email')" required />
													                <x-input-error :messages="$errors->get('email')" class="mt-2" />
								</div>
								<div class="form-group">
																								                <x-input-label for="register-password" :value="__('auth.password')">
lock
</x-input-label>
									                <x-text-input id="register-password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
								</div>
								<div class="form-group">
																																                <x-input-label for="register-password2" :value="__('auth.confirm password')">
lock
</x-input-label>
									                <x-text-input id="register-password2" class="form-control" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
								</div>
								<div class="form-group">
																                <x-primary-button class="btn pull-right">
                    {{ __('auth.Register') }}
                </x-primary-button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-6 col-sm-offset-1 social-login">
						<p>{{ __('auth.social-register') }}</p>
						<div class="social-login-buttons">
							<a href="#" class="btn-facebook-login">{{ __('auth.use Facebook') }}</a>
							<a href="#" class="btn-twitter-login">{{ __('auth.use Twitter') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection