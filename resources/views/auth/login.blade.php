@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf

        @if(session('error'))
            <h5>{{ session('error') }}</h5>
            <br><br>
        @endif

        <input type="text" name="email" placeholder="email" value="{{ old('email') }}">
        @error('email')
        {{ $message }}
        @enderror
        <br><br>

        <input type="password" name="password" placeholder="password">
        @error('password')
        {{ $message }}
        @enderror
        <br><br>

        <button>submit</button>
    </form>
@endsection
