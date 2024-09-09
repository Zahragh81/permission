@extends('layouts.master')

@section('title', 'Admin Index')

@section('content')
    <h1>Admin Index</h1>

    <div>
        <a href="{{ route('admin.create') }}" class="btn btn-success">create</a>
    </div>

    <table class="table table-hover table-striped text-center">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>عملیات</th>
        </tr>
        </thead>

        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a href="{{ route('user.show', $admin->id) }}" class="btn btn-warning">show</a>
                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">edit</a>

                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
