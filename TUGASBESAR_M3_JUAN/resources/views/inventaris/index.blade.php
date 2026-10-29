@extends('layouts.app')

@section('title', 'Modul Inventaris - Sistem Manajemen Kos')

@section('content')
<div class="top-header">
    <h1>Modul Pengelolaan Inventaris</h1>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h2>Tambah Data Inventaris</h2>
    <form action="{{ route('inventaris.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
            <div>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Merek</label>
                <input type="text" name="merek" required style="width: 100%; padding: 8px;">
            </div>
            <div>
                <label>Kondisi</label>
                <select name="kondisi" style="width: 100%; padding: 8px;">
                    <option value="Bagus">Bagus</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>
        </div>
        <button type="submit" style="margin-top: 15px; padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data Inventaris</button>
    </form>
</div>

<div class="card">
    <h2>Daftar Inventaris</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f3f4f6;">
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventaris as $item)
                <tr>
                    <td>{{ $item->id_inventaris }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <a href="{{ route('inventaris.edit', $item->id_inventaris) }}" style="padding: 6px 12px; background: #2563eb; color: white; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                        <form action="{{ route('inventaris.destroy', $item->id_inventaris) }}" method="POST" onsubmit="return confirm('Hapus data inventaris ini?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 6px 12px; background: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data inventaris.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection