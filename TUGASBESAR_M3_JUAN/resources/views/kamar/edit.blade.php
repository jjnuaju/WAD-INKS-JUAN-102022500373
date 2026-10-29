@extends('layouts.app')

@section('title', 'Edit Data Kamar')

@section('content')
<div class="top-header">
    <h1>Edit Data Kamar</h1>
</div>

<div class="card">
    <form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nomor Kamar</label>
                <input type="text" name="nomor_kamar" value="{{ $kamar->nomor_kamar }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Tipe Kamar</label>
                <input type="text" name="tipe" value="{{ $kamar->tipe }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Harga (Rp)</label>
                <input type="number" name="harga" value="{{ $kamar->harga }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Status</label>
                <select name="status" style="width: 100%; padding: 8px;">
                    <option value="Tersedia" {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Terisi" {{ $kamar->status == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                    <option value="Perbaikan" {{ $kamar->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                </select>
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('kamar.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection