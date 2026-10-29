<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Kos')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Sidebar Navigasi -->
    <div class="sidebar">
        <div class="brand">🏠 Manajemen Kos</div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">📊 Dashboard</a></li>
            <li><a href="{{ route('kamar.index') }}" class="{{ request()->routeIs('kamar.*') ? 'active' : '' }}">🏢 Modul Kamar</a></li>
            <li><a href="{{ route('penghuni.index') }}" class="{{ request()->routeIs('penghuni.*') ? 'active' : '' }}">👥 Modul Penghuni</a></li>
            <li><a href="{{ route('housekeeper.index') }}" class="{{ request()->routeIs('housekeeper.*') ? 'active' : '' }}">🧹 Modul Housekeeper</a></li>
            <li><a href="{{ route('inventaris.index') }}" class="{{ request()->routeIs('inventaris.*') ? 'active' : '' }}">📦 Modul Inventaris</a></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>