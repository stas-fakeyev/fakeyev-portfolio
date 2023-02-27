
@php
$flag = 'img/flags/'.$currentLanguage['flag'];
@endphp
															<div class="dropdown choose-country">
									<a class="#" data-toggle="dropdown" href="javascript:void(0)"><img src="{{ asset($flag) }}" alt="{{ $currentLanguage['native'] }}"> {{ $currentLanguage['code'] }}</a>
									<ul class="dropdown-menu" role="menu">
									@foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
									@php
									$flag = 'img/flags/'.$properties['flag'];
									@endphp
										<li role="menuitem"><a href="{{ $links[$localeCode] }}"><img src="{{ asset($flag) }}" alt="{{ $properties['native'] }}"> {{ $localeCode }}</a></li>
										@endforeach
									</ul>
								</div>