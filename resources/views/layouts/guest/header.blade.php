<header class="guest-header fixed-top">
    <div class="container header-wrap">

        <!-- BRAND -->
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Logo">
            <div class="brand-text">
                <strong>Lembaga<br>Pemberdayaan Masyarakat</strong>
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
<div class="user-dropdown">

    <button class="user-trigger" onclick="toggleUserDropdown(event)">
        <span class="notif">
            {{ auth()->user()->unread_notifications_count ?? 0 }}
        </span>

        <div class="avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>

        <div class="user-info">
            <strong>{{ auth()->user()->name }}</strong>
            <small>{{ ucfirst(auth()->user()->role ?? 'User') }}</small>
        </div>

        <i class="bi bi-chevron-down arrow"></i>
    </button>

    <div class="dropdown-menu-user">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">
                <i class="bi bi-box-arrow-right"></i>
                Logout
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
    .user-dropdown {
    position: relative;
    display: inline-block;
}

.user-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 999px;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0,0,0,.1);
}

.user-trigger:hover {
    background: #f5f5f5;
}

.avatar {
    width: 38px;
    height: 38px;
    background: #ec4899;
    color: #fff;
    font-weight: bold;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.user-info {
    text-align: left;
}

.user-info small {
    display: block;
    font-size: 12px;
    color: #777;
}

.notif {
    background: red;
    color: #fff;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 50%;
    position: absolute;
    top: -4px;
    left: -4px;
}

.arrow {
    font-size: 12px;
    color: #666;
}

.dropdown-menu-user {
    position: absolute;
    top: 120%;
    right: 0;
    background: #fff;
    min-width: 180px;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,.15);
    opacity: 0;
    transform: translateY(-10px);
    pointer-events: none;
    transition: .2s ease;
    z-index: 999;
}

.user-dropdown.active .dropdown-menu-user {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

.dropdown-item {
    width: 100%;
    padding: 12px 15px;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
}

.dropdown-item:hover {
    background: #f1f1f1;
}
</style>

<script>
function toggleUserDropdown(event) {
    event.stopPropagation();
    const dropdown = event.currentTarget.closest('.user-dropdown');
    dropdown.classList.toggle('active');
}

document.addEventListener('click', function () {
    document.querySelectorAll('.user-dropdown').forEach(el => {
        el.classList.remove('active');
    });
});
</script>
