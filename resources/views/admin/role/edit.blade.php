@extends('layouts.master')

@section('title', 'Role Edit')

@section('content')
    <h1>Role Edit</h1>

    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="title" class="form-label">نام</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $role->title }}">
            </div>

            <div class="col-md-6">
                <label for="name" class="form-label">کلید</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
            </div>
        </div>

        <hr>

        <div class="row g-3">
            @foreach($permissionGroups as $permissionGroup)
                <div class="col-md-4">
                    <h6>{{ $permissionGroup->name }}</h6>

                    @foreach($permissionGroup->permissions as $permission)
                        <div>
                            <input type="checkbox" name="permissions[{{ $permission->id }}]"
                                   id="permissions-{{ $permission->id }}" value="{{ $permission->id }}"
                                    @if(in_array($permission->id, $role_permission_ids)) checked @endif>

                            <label for="permissions-{{ $permission->id }}"
                                   class="form-label">{{ $permission->title }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="col-12">
            <button class="btn btn-success float-end">ذخیره</button>
        </div>
    </form>
@endsection
