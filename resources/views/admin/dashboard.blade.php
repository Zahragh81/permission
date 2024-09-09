@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>

    <a href="{{ route('admin.index') }}">admin index</a><br><br>

    @can('user_index')
        <a href="{{ route('user.index') }}">user index</a><br><br>
    @endcan

    <a href="{{ route('role.index') }}">role index</a><br><br>
    <a href="{{ route('permission.index') }}">permission index</a><br><br>

    <a href="{{ route('auth.logout') }}" class="btn btn-danger">logout</a>
@endsection
