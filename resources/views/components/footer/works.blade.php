		    		<div class="col-footer col-md-3 col-xs-6">
		    			<h3>{{ __('home.our-latest-work') }}</h3>
						@isset($work)
		    			<div class="portfolio-item">
							<div class="portfolio-image">
							@php
														if ($work->image){
							$url = Storage::disk('public')->url('posts/thumb/'.$work->image);
							}
							else{
								$url = Storage::disk('public')->url('posts/default.png');
							}
							@endphp
								<a href="{{ route('posts.show', ['post' => $work->slug]) }}"><img src="{{ $url }}" alt="{{ $work->title }}"></a>
							</div>
						</div>
						@endisset
		    		</div>