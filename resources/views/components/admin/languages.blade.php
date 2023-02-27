
@php
$flag = 'img/flags/'.$currentLanguage['flag'];
@endphp
								@if (count(LaravelLocalization::getLocalesOrder()) > 0)
									                                <li><a data-toggle="collapse" data-target="#Charts" href="javascript:void(0)"><img src="{{ asset($flag) }}" alt="{{ $currentLanguage['native'] }}"> {{ $currentLanguage['code'] }}</a>
                                    <ul class="collapse dropdown-header-top">
									@foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
									@php
									$flag = 'img/flags/'.$properties['flag'];
									@endphp
									                                        <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $localeCode }}</a></li>
										@endforeach
									</ul>
									</li>
									@endif