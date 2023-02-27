@extends('layout.site', ['title' => 'the Main Page'])
@section('content')
@if (count($sliders) > 0)
	        <!-- Homepage Slider -->
        <div class="homepage-slider">
        	<div id="sequence">
				<ul class="sequence-canvas">
				@php
				$count = count($sliders);
				@endphp
@foreach ($sliders as $slider)
@php
$backgroundUrl = Storage::disk('public')->url('home-slider/source/' . $slider->images['background']);
@endphp
					<li style="background-image: url({{ $backgroundUrl }});">
						<!-- Slide Title -->
						<h2 class="title">{{ $slider->title }}</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">{{ $slider->subtitle }}</h3>
						<!-- Slide Image -->
						@php
						$slideUrl = Storage::disk('public')->url('home-slider/source/' . $slider->images['slide']);
						@endphp
						<img class="slide-img" src="{{ $slideUrl }}" alt="{{ $slideUrl }}" />
					</li>
@endforeach
</ul>
				<div class="sequence-pagination-wrapper">
					<ul class="sequence-pagination">
					@for ($x = 1; $x <= $count; $x++)
						<li>{{ $x }}</li>
					@endfor
					</ul>
				</div>

			</div>
        </div>
        <!-- End Homepage Slider -->
@endif
@isset($users)
@if (count($users) > 0)
			<!-- Our Clients -->
	    <div class="section">
	    	<div class="container">
	    		<h2>{{ __('home.our-clients') }}</h2>
				<div class="clients-logo-wrapper text-center row">
@foreach ($users as $user)
										@php
										if (isset($user->avatar)){
										$url = Storage::disk('public')->url('users/source/' . $user->avatar);
									}
									else{
																				$url = Storage::disk('public')->url('users/source/default.png');
									}
									@endphp
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="javascript:void(0)"><img src="{{ $url }}" alt="{{ $user->name }} {{ $url }}"></a></div>
@endforeach
				</div>
			</div>
	    </div>
	    <!-- End Our Clients -->

@endif
@endisset
@endsection