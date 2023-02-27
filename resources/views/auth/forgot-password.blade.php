@extends('layout.site', ['title' => __('auth.forgot-password')])

@section('content')
<x-breadcrumbs>
{{ __('auth.forgot-password') }}
</x-breadcrumbs>

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="basic-login">
							<form action="{{ route('password.email') }}" method="POST" role="form">
							@csrf
								<div class="form-group">
																								                <x-input-label for="restore-email" :value="__('auth.enter-email')">
envelope
</x-input-label>
									                <x-text-input id="restore-email" class="form-control" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
