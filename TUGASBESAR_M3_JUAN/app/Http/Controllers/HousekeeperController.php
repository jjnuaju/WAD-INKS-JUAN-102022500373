<?php

namespace App\Http\Controllers;

use App\Models\Housekeeper;
use Illuminate\Http\Request;

class HousekeeperController extends Controller
{
    public function index()
    {
        $housekeeper = Housekeeper::orderBy('id_housekeeper', 'desc')->get();
        return view('housekeeper.index', compact('housekeeper'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_staff'       => 'required',
            'tugas_kebersihan' => 'required',
            'area_penanganan'  => 'required',
            'no_hp'            => 'required',
        ]);

        Housekeeper::create($validated);
        return redirect()->route('housekeeper.index');
    }

    public function destroy($id)
    {
        Housekeeper::destroy($id);
        return redirect()->route('housekeeper.index');
    }

    public function edit($id)
{
    $housekeeper = Housekeeper::findOrFail($id);
    return view('housekeeper.edit', compact('housekeeper'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_staff'       => 'required',
        'tugas_kebersihan' => 'required',
        'area_penanganan'  => 'required',
        'no_hp'            => 'required',
    ]);

    $housekeeper = Housekeeper::findOrFail($id);
    $housekeeper->update($validated);

    return redirect()->route('housekeeper.index')->with('success', 'Data Housekeeper Berhasil Diperbarui');
}
}