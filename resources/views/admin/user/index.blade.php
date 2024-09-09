@extends('layouts.master')

@section('title', 'User Index')

@section('content')
    <h1>User Index</h1>

    <div>
        @can('user_create')
            <a href="{{ route('user.create') }}" class="btn btn-success">create</a>
        @endcan
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
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @can('user_show')
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning">show</a>
                    @endcan

                    @can('user_edit')
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">edit</a>
                    @endcan

                    @can('user_destroy')
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
