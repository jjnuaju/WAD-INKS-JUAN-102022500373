@extends('layouts.app')

@section('title', 'Dashboard - Sistem Manajemen Kos')

@section('content')
<!-- Header Top -->
<div class="top-header">
    <div>
        <h1>Dashboard Utama</h1>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Sistem Pengelolaan Properti Kos Terpadu.</p>
    </div>
    <div class="user-profile">
        <div class="user-avatar">A</div>
        <span style="font-size: 0.875rem; font-weight: 600;">Admin / Leel</span>
    </div>
</div>

<!-- Card Modul Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="label">Total Kamar</div>
        <div class="value">{{ $total_kamar }}</div>
        <div class="subtext">Unit Terdaftar</div>
    </div>
    <div class="stat-card">
        <div class="label">Total Penghuni</div>
        <div class="value">{{ $total_penghuni }}</div>
        <div class="subtext">Penyewa Aktif</div>
    </div>
    <div class="stat-card">
        <div class="label">Total Staff</div>
        <div class="value">{{ $total_housekeeper }}</div>
        <div class="subtext">Housekeeper</div>
    </div>
    <div class="stat-card">
        <div class="label">Total Inventaris</div>
        <div class="value">{{ $total_inventaris }}</div>
        <div class="subtext">Aset Barang</div>
    </div>
</div>

<!-- Access Modules Section -->
<h3 style="margin-bottom: 16px;">Akses Modul Pengelolaan</h3>
<div class="module-grid">
    <div class="module-card">
        <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=400&auto=format&fit=crop&q=80" alt="Kamar">
        <div class="card-body">
            <h4>Modul Master Kamar</h4>
            <p>Kelola tipe kamar, ukuran ruangan, harga sewa, dan fasilitas.</p>
            <a href="{{ route('kamar.index') }}">Buka Modul Kamar</a>
        </div>
    </div>

    <div class="module-card">
        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&auto=format&fit=crop&q=80" alt="Penghuni">
        <div class="card-body">
            <h4>Modul Data Penghuni</h4>
            <p>Pencatatan profil penyewa, nomor identitas KTP, dan kontak darurat.</p>
            <a href="{{ route('penghuni.index') }}">Buka Modul Penghuni</a>
        </div>
    </div>

    <div class="module-card">
        <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&auto=format&fit=crop&q=80" alt="Housekeeper">
        <div class="card-body">
            <h4>Modul Housekeeper</h4>
            <p>Kelola penjaga kos, tugas kebersihan, dan area penanganan.</p>
            <a href="{{ route('housekeeper.index') }}">Buka Modul Housekeeper</a>
        </div>
    </div>

    <div class="module-card">
        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&auto=format&fit=crop&q=80" alt="Inventaris">
        <div class="card-body">
            <h4>Modul Inventaris Aset</h4>
            <p>Pendataan aset barang elektronik, furniture, serta kondisi fisiknya.</p>
            <a href="{{ route('inventaris.index') }}">Buka Modul Inventaris</a>
        </div>
    </div>
</div>
@endsection