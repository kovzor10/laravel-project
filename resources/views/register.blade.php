@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- if the session has any error --}}
            @if(session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- if the session got success key --}}
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        <form method="POST" action="{{ route('register.post') }}" class="ms-auto me-auto mt-3" style="width: 500px">
            @csrf
            {{-- Username --}}
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>

            {{-- Name --}}
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            {{-- Surname --}}
            <div class="mb-3">
                <label class="form-label">Surname</label>
                <input type="text" class="form-control" name="surname">
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div style="display: flex">
                <button type="submit" class="btn btn-primary">Register</button>
                <p style="margin-left: 10px">or Already have an account?</p>
                    <a style="margin-left: 10px" href="{{ route('login') }}">Login</a>
            </div>

        </form>
    </div>
@endsection
