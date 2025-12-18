@extends('layouts.guest.app')

@section('title', 'Login')

@section('content')

<div class="d-flex justify-content-center align-items-start" style="padding-top: 40px; min-height: calc(100vh - 120px);">

    <div class="card shadow p-4" style="width: 360px; border-radius: 15px; font-family: 'Poppins', sans-serif;">
        
        <h4 class="text-center mb-4" style="font-weight: 600;">
            <img src="{{ asset('guest/assets/img/ribbon.png') }}" alt="" width="25" class="me-1">
            Login
        </h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: 500;">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                    style="border-radius: 10px;"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="form-label" style="font-weight: 500;">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control" 
                    required
                    style="border-radius: 10px;"
                >
            </div>

            <button class="btn btn-primary w-100" style="border-radius: 10px; font-weight: 600; letter-spacing: 0.5px;">
                Login
            </button>

            <p class="text-center mt-3 mb-0" style="font-size: 14px;">
                Belum punya akun?
                <a href="{{ route('register') }}" style="font-weight: 600;">Register</a>
            </p>
        </form>
    </div>

</div>

@endsection
