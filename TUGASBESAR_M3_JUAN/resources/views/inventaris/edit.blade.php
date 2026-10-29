@extends('layouts.app')

@section('title', 'Edit Data Inventaris')

@section('content')
<div class="top-header">
    <h1>Edit Data Inventaris</h1>
</div>

<div class="card">
    <form action="{{ route('inventaris.update', $inventaris->id_inventaris) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ $inventaris->nama_barang }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Merek</label>
                <input type="text" name="merek" value="{{ $inventaris->merek }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kondisi</label>
                <select name="kondisi" style="width: 100%; padding: 8px;">
                    <option value="Bagus" {{ $inventaris->kondisi == 'Bagus' ? 'selected' : '' }}>Bagus</option>
                    <option value="Rusak Ringan" {{ $inventaris->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ $inventaris->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('inventaris.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection