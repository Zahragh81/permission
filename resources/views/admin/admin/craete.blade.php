@extends('layouts.master')

@section('title', 'Admin Create')

@section('content')
    <h1>Admin Create</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label for="user_id">کاربر</label>
                <select name="user_id" id="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ "$user->email - $user->name" }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                @foreach($admin_roles as $admin_role)
                    <div>
                        <input type="checkbox" name="roles[]" id="" value="{{ $admin_role->id }}">
                        <label for="">{{ $admin_role->title }}</label>
                    </div>
                @endforeach
            </div>


            <div class="col-12">
                <button class="btn btn-primary float-end">submit</button>
            </div>
        </div>
    </form>
@endsection
