@extends('layouts.master')

@section('title', 'Permission Index')

@section('content')
    <h1>Permission Index</h1>

    <table class="table table-hover table-striped text-center">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>کلید</th>
            <th>گروه</th>
        </tr>
        </thead>

        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->title }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->permissionGroup->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
