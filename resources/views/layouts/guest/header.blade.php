<header class="guest-header fixed-top">
    <div class="container header-wrap">

        <!-- BRAND -->
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Logo">
            <div class="brand-text">
                <strong>Lembaga<br>Pemberdayaan Masyarakat</strong>
                <small>Desa Example</small>
            </div>
        </a>

        <!-- NAV -->
        <nav class="main-nav">

            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i> Beranda
            </a>

            <a href="{{ route('informasi_umum.publik') }}"
               class="{{ request()->routeIs('informasi_umum.*') ? 'active' : '' }}">
                <i class="bi bi-megaphone"></i> Informasi Umum
            </a>

            @auth
                <a href="{{ route('warga.index') }}" class="{{ request()->routeIs('warga.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Data Warga
                </a>

                <a href="{{ route('perangkat.index') }}" class="{{ request()->routeIs('perangkat.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Perangkat Desa
                </a>

                <a href="{{ route('lembaga.index') }}" class="{{ request()->routeIs('lembaga.*') ? 'active' : '' }}">
                    <i class="bi bi-bank"></i> Lembaga Desa
                </a>

                <a href="{{ route('jabatan_lembaga.index') }}"
                   class="{{ request()->routeIs('jabatan_lembaga.*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i> Jabatan Lembaga
                </a>

                <a href="{{ route('anggota_lembaga.index') }}"
                   class="{{ request()->routeIs('anggota_lembaga.*') ? 'active' : '' }}">
                    <i class="bi bi-person-lines-fill"></i> Anggota Lembaga
                </a>
            @endauth

        </nav>

        <!-- USER -->
        @auth
        <div class="user-pill dropdown-user" onclick="toggleUserDropdown(event)">
            <span class="notif">{{ auth()->user()->unread_notifications_count ?? 0 }}</span>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>

            <div class="user-info">
                <strong>{{ auth()->user()->name }}</strong>
                <small>{{ ucfirst(auth()->user()->role ?? 'User') }}</small>
            </div>

            <div class="dropdown-menu">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        @endauth

    </div>
</header>

<style>
    /* =====================
   GLOBAL FIX (PENTING)
===================== */
    body {
        padding-top: 80px;
        /* tinggi header */
    }

    /* =====================
   HEADER
===================== */
    .guest-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 80px;
        background: #fff;
        box-shadow: 0 6px 25px rgba(0, 0, 0, .08);
        z-index: 9999;
        pointer-events: auto;
    }

    .guest-header * {
        pointer-events: auto;
    }

    .header-wrap {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        position: relative;
        z-index: 10;
    }

    /* =====================
   BRAND
===================== */
    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        color: #111827;
        position: relative;
        z-index: 10;
    }

    .brand img {
        height: 44px;
    }

    .brand-text strong {
        font-size: 15px;
        line-height: 1.2;
    }

    .brand-text small {
        font-size: 12px;
        color: #6b7280;
    }

    /* =====================
   NAVIGATION
===================== */
    .main-nav {
        display: flex;
        gap: 18px;
        align-items: center;
        position: relative;
        z-index: 10;
    }

    .main-nav a {
        text-decoration: none;
        font-size: 14px;
        color: #374151;
        padding: 8px 14px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        position: relative;
        z-index: 10;
    }

    .main-nav a:hover {
        background: #f3f4f6;
    }

    .main-nav a.active {
        background: #e6f6ee;
        color: #16a34a;
        font-weight: 600;
    }

    /* =====================
   USER PILL
===================== */
    .user-pill {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f3f4f6;
        padding: 6px 12px;
        border-radius: 999px;
        position: relative;
        z-index: 10;
        cursor: pointer;
    }

    .avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #22c55e;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .user-info strong {
        font-size: 13px;
    }

    .user-info small {
        font-size: 11px;
        color: #6b7280;
    }

    .notif {
        position: absolute;
        top: -4px;
        left: -4px;
        background: #ef4444;
        color: #fff;
        font-size: 10px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 20;
    }
</style>
