@extends('layouts.master')

@section('title', 'User Edit')

@section('content')
    <h1>User Edit</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}">
            </div>

            <div class="col-md-6">
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ $user->email }}">
            </div>

            <div class="col-12">
                <button class="btn btn-primary float-end">submit</button>
            </div>
        </div>
    </form>
@endsection
