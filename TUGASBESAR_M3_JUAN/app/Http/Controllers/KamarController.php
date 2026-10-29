<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::orderBy('id_kamar', 'desc')->get();
        return view('kamar.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required',
            'tipe'        => 'required',
            'harga'       => 'required|numeric',
            'status'      => 'required',
        ]);

        Kamar::create($validated);
        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        Kamar::destroy($id);
        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Dihapus');
    }
    public function edit($id)
    {
    $kamar = Kamar::findOrFail($id);
    return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {   
    $validated = $request->validate([
        'nomor_kamar' => 'required',
        'tipe'        => 'required',
        'harga'       => 'required|numeric',
        'status'      => 'required',
    ]);

    $kamar = Kamar::findOrFail($id);
    $kamar->update($validated);

    return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Diperbarui');
    }
}