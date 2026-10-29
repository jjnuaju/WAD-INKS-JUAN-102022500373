<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::orderBy('id_penghuni', 'desc')->get();
        return view('penghuni.index', compact('penghuni'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required',
            'no_ktp'         => 'required',
            'pekerjaan'      => 'required',
            'kontak_darurat' => 'required',
        ]);

        Penghuni::create($validated);
        return redirect()->route('penghuni.index');
    }

    public function destroy($id)
    {
        Penghuni::destroy($id);
        return redirect()->route('penghuni.index');
    }

    public function edit($id)
{
    $penghuni = Penghuni::findOrFail($id);
    return view('penghuni.edit', compact('penghuni'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_lengkap'   => 'required',
        'no_ktp'         => 'required',
        'pekerjaan'      => 'required',
        'kontak_darurat' => 'required',
    ]);

    $penghuni = Penghuni::findOrFail($id);
    $penghuni->update($validated);

    return redirect()->route('penghuni.index')->with('success', 'Data Penghuni Berhasil Diperbarui');
}
}