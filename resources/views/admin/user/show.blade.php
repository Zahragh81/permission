@extends('layouts.master')

@section('title', 'User Show')

@section('content')
    <h1>User Show</h1>

    <div class="row g-3">
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="col-12">
            <a href="{{ route('user.index') }}" class="btn btn-primary float-end">back</a>
        </div>
    </div>
@endsection
