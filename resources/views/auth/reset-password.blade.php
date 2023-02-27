@extends('layout.site', ['title' => __('auth.reset-password')])

@section('content')
<x-breadcrumbs>
{{ __('auth.reset-password') }}
</x-breadcrumbs>

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="basic-login">
						<h2> token {{ $request->route('token') }}</h2>
							<form role="form" action="{{ route('password.store') }}" method="POST">
							@csrf
							            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                    {{ __('auth.reset-password') }}
                </x-primary-button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection