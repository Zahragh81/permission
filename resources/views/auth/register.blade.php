@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <h1>Register</h1>

    <form action="{{ route('auth.register') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
        @error('name')
        {{ $message }}
        @enderror
        <br><br>

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

        <input type="password" name="password_confirmation" placeholder="password confirmation">
        @error('password_confirmation')
        {{ $message }}
        @enderror
        <br><br>

        <button>submit</button>
    </form>
@endsection
