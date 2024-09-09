@extends('layouts.master')

@section('title', 'User Create')

@section('content')
    <h1>User Create</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>

            <div class="col-md-6">
                <input type="text" name="email" class="form-control" placeholder="email">
            </div>

            <div class="col-md-6">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>

            <div class="col-12">
                <button class="btn btn-primary float-end">submit</button>
            </div>
        </div>
    </form>
@endsection
