@extends('layouts.app')

@section('title', 'Edit Data Housekeeper')

@section('content')
<div class="top-header">
    <h1>Edit Data Housekeeper</h1>
</div>

<div class="card">
    <form action="{{ route('housekeeper.update', $housekeeper->id_housekeeper) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label>Nama Staff</label>
                <input type="text" name="nama_staff" value="{{ $housekeeper->nama_staff }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Tugas Kebersihan</label>
                <input type="text" name="tugas_kebersihan" value="{{ $housekeeper->tugas_kebersihan }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Area Penanganan</label>
                <input type="text" name="area_penanganan" value="{{ $housekeeper->area_penanganan }}" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>No. HP</label>
                <input type="text" name="no_hp" value="{{ $housekeeper->no_hp }}" required style="width: 100%; padding: 8px;">
            </div>
        </div>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Update Data</button>
            <a href="{{ route('housekeeper.index') }}" style="padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 4px;">Batal</a>
        </div>
    </form>
</div>
@endsection