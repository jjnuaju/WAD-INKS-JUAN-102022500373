@extends('layouts.app')

@section('title', 'Edit Data Penghuni')

@section('content')
<div class="top-header">
    <h1>Edit Data Penghuni</h1>
</div>

<div class="card">
    <form action="{{ route('penghuni.update', $penghuni->id_penghuni) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $penghuni->nama_lengkap }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. KTP</label>
                <input type="text" name="no_ktp" value="{{ $penghuni->no_ktp }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ $penghuni->pekerjaan }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kontak Darurat</label>
                <input type="text" name="kontak_darurat" value="{{ $penghuni->kontak_darurat }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('penghuni.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection