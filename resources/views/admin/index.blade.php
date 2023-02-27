@extends('layout.admin', ['title' => 'Admin panel'])

@section('content')
    <h1>Admin panel</h1>
    <p>Welcome, {{ auth()->user()->name }} {{ auth()->user()->role->name }}</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Выйти</button>
    </form>
@endsection