@extends('layout.site', ['title' => 'Dashboard'])

@section('content')
<p>here your dashboard</p>
<form action="{{ route('logout') }}" method="POST">
@csrf
<button type="submit">logout</button>
</form>
@endsection