<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::orderBy('id_inventaris', 'desc')->get();
        return view('inventaris.index', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'merek'       => 'required',
            'kondisi'     => 'required',
        ]);

        Inventaris::create($validated);
        return redirect()->route('inventaris.index');
    }

    public function destroy($id)
    {
        Inventaris::destroy($id);
        return redirect()->route('inventaris.index');
    }

    public function edit($id)
{
    $inventaris = Inventaris::findOrFail($id);
    return view('inventaris.edit', compact('inventaris'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_barang' => 'required',
        'merek'       => 'required',
        'kondisi'     => 'required',
    ]);

    $inventaris = Inventaris::findOrFail($id);
    $inventaris->update($validated);

    return redirect()->route('inventaris.index')->with('success', 'Data Inventaris Berhasil Diperbarui');
}
}