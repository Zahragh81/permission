@extends('layouts.master')

@section('title', 'Admin Edit')

@section('content')
    <h1>Admin Edit</h1>

    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h5>{{ "$admin->email - $admin->name" }}</h5>

        <div class="row g-3">
            <div class="col-12">
                @foreach($admin_roles as $admin_role)
                    <div>
                        <input type="checkbox" name="roles[]" id="" value="{{ $admin_role->id }}"
                            @if(in_array($admin_role->id, $roles_ids)) checked @endif>
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
