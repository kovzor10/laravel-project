@extends('layout')
@section('title', 'Login')
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

        <form method="POST" action="{{ route('login.post') }}" class="ms-auto me-auto mt-3" style="width: 500px">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div style="display: flex">
                <button type="submit" class="btn btn-primary">Login</button>
                <p style="margin: 0 10px">or</p>
                <a href="{{ route('register') }}">Register</a>
            </div>

          </form>
    </div>
@endsection
