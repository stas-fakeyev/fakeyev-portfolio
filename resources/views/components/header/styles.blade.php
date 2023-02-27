@if ( count($styles) > 0 )
	@foreach ($styles as $style)
		<link rel="stylesheet" href="{{ asset( $style ) }}">
@endforeach
@endif

@if ( count($scripts) > 0)
	@foreach($scripts as $script)
        <script src="{{ asset($script) }}"></script>
@endforeach
@endif