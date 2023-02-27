		    		<div class="col-footer col-md-3 col-xs-6">
		    			<h3>{{ __('home.navigate') }}</h3>
											@if ($menu)
												@php
											$items = $menu->roots();
											@endphp
		    			<ul class="no-list-style footer-navigate-section">
						@foreach ($items as $item)
		    				<li><a href="{{ $item->url() }}">{{ $item->title }}</a></li>
							@endforeach
		    			</ul>
						@endif
		    		</div>