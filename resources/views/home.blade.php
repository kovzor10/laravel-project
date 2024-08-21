@extends('layout')
@section('title', "Home Page")
@section('content')
@auth
    <div class="container">
        <h1>Users List</h1>

        <form method="GET" action="{{ route('home') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by username" value="{{ request()->query('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <a href="{{ route('user.add') }}" class="btn btn-primary mb-3">Add User</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <td>Password</td>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->password }}</td>
                        <td><a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div>You must Log In</div>
@endauth
@endsection
