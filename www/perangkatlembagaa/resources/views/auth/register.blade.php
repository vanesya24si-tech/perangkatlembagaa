@extends('layouts.guest.app')

@section('title', 'Register')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body, * {
        font-family: "Poppins", sans-serif !important;
    }

    /* BACKGROUND SLIDESHOW */
    #bg-slideshow {
        position: fixed;
        inset: 0;
        background-size: cover;
        background-position: center;
        z-index: 1;
        filter: brightness(60%);
        transition: opacity 1.2s ease-in-out;
    }

    .register-wrapper {
        margin-top: 40px;
        min-height: calc(100vh - 120px);
        position: relative;
        z-index: 2;
    }

    .register-card {
        width: 360px;
        border-radius: 15px;
        padding: 25px;
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(8px);
        animation: fadeIn .7s ease-out;
    }

    .register-title {
        font-weight: 600;
        font-size: 24px;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-primary {
        background-color: #198754;
        border: none;
        font-weight: 600;
        height: 45px;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #157347;
    }

    .form-control {
        border-radius: 10px;
        height: 42px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

{{-- BACKGROUND --}}
<div id="bg-slideshow"></div>

<div class="d-flex justify-content-center register-wrapper">
    <div class="register-card shadow">

        <h4 class="text-center register-title mb-3">Register</h4>

        @if ($errors->any())
            <div class="alert alert-danger p-2">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li style="font-size: 14px;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="warga" {{ old('role') == 'warga' ? 'selected' : '' }}>Warga</option>
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Register</button>

            <p class="text-center mt-3 mb-0" style="font-size: 14px;">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="fw-semibold">Login</a>
            </p>
        </form>

    </div>
</div>

{{-- SLIDESHOW SCRIPT --}}
<script>
    const images = [
       "https://images.unsplash.com/photo-1596495577886-d920f1fb7238", // masyarakat desa
        "https://images.unsplash.com/photo-1520975916090-3105956dac38", // warga berdiskusi
        "https://images.unsplash.com/photo-1509099836639-18ba1795216d", // kehidupan sosial
        "https://images.unsplash.com/photo-1588072432836-e10032774350"  // kebersamaan warga
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
