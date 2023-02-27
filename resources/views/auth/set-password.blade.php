@extends('layout.site', ['title' => __('auth.set-password')])

@section('content')
<x-breadcrumbs>
{{ __('auth.set-password') }}
</x-breadcrumbs>

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="basic-login">
						<h2>{{ $user->name }}</h2>
							<form role="form" action="{{ route('password.make', ['user' => $user->id,
							'expires' => $request->get('expires'),
							'hash' => $request->get('hash'),
							'signature' => $request->get('signature')
							]) }}" method="POST">
							@csrf

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
                    {{ __('auth.set-password') }}
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