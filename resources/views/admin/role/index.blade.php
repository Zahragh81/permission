@extends('layouts.master')

@section('title', 'Role Index')

@section('content')
    <h1>Role Index</h1>

    <a href="{{ route('role.create') }}" class="btn btn-success">create</a>

    <table class="table table-hover table-striped text-center">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>کلید</th>
            <th>گروه</th>
            <th>عملیات</th>
        </tr>
        </thead>

        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->title }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->roleGroup->name }}</td>

                <th>
                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">edit</a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
