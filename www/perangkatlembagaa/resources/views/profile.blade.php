@extends('layouts.guest.app')

@section('title', 'Profile')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">

                    <div class="profile-avatar mb-3">
                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                    </div>

                    <h5 class="fw-bold mb-0">
                        {{ auth()->user()->name }}
                    </h5>
                    <small class="text-muted">
                        {{ auth()->user()->email }}
                    </small>

                    <hr>

                    <div class="text-start">
                        <p class="mb-2">
                            <strong>Nama</strong><br>
                            <span class="text-muted">{{ auth()->user()->name }}</span>
                        </p>

                        <p class="mb-0">
                            <strong>Email</strong><br>
                            <span class="text-muted">{{ auth()->user()->email }}</span>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

<style>
.profile-avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    background:#0d6efd;
    color:#fff;
    font-size:36px;
    font-weight:bold;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto;
}
</style>
