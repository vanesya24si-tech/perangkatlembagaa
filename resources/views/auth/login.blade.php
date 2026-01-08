@extends('layouts.guest.app')

@section('title', 'Login')

@section('content')

{{-- BACKGROUND SLIDESHOW --}}
<div id="bg-slideshow"></div>

<div class="d-flex justify-content-center align-items-start position-relative"
     style="padding-top: 40px; min-height: calc(100vh - 120px); z-index:2;">

    <div class="card shadow p-4 fade-card"
         style="width: 360px; border-radius: 15px; font-family: 'Poppins', sans-serif; backdrop-filter: blur(8px); background: rgba(255,255,255,.9);">

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
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100 fw-semibold">
                Login
            </button>

            <p class="text-center mt-3 mb-0" style="font-size: 14px;">
                Belum punya akun?
                <a href="{{ route('register') }}" class="fw-semibold">Register</a>
            </p>
        </form>
    </div>
</div>

{{-- SLIDESHOW SCRIPT --}}
<script>
    const images = [
        "https://images.unsplash.com/photo-1506744038136-46273834b3fb",
        "https://images.unsplash.com/photo-1507525428034-b723cf961d3e",
        "https://images.unsplash.com/photo-1501785888041-af3ef285b470",
        "https://images.unsplash.com/photo-1526772662000-3f88f10405ff"
    ];

    let i = 0;
    const bg = document.getElementById('bg-slideshow');

    function slideBg() {
        bg.style.opacity = 0;
        setTimeout(() => {
            bg.style.backgroundImage = `url('${images[i]}')`;
            bg.style.opacity = 1;
            i = (i + 1) % images.length;
        }, 800);
    }

    slideBg();
    setInterval(slideBg, 6000);
</script>

@endsection
