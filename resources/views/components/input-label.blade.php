@props(['value'])

<label {{ $attributes }}><i class="icon-{{ $slot }}"></i>

    <b>{{ $value ?? $slot }}</b>
</label>
