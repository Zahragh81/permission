@extends('layouts.master')

@section('title', 'landing')

@section('content')
    <h1>Landing</h1>

    @guest
        <a href="{{ route('auth.register-view') }}">register</a>
        <br><br>

        <a href="{{ route('auth.login-view') }}">login</a>
    @endguest

    @auth
        <h3>welcome {{ auth()->user()->name }}</h3><br><br>

        @can('dashboard')
            <a href="{{ route('admin.dashboard') }}">admin dashboard</a>
        @endcan
    @endauth
@endsection
