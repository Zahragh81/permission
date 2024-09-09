@extends('layouts.master')

@section('title', 'Role Create')

@section('content')
    <h1>Role Create</h1>

    <form action="{{ route('role.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label for="title" class="form-label">نام</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="col-md-6">
                <label for="name" class="form-label">کلید</label>
                <input type="text" name="name" id="name" class="form-control">
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
                                   id="permissions-{{ $permission->id }}" value="{{ $permission->id }}">
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
