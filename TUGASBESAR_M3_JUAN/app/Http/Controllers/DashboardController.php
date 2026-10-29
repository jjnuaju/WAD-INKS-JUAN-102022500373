<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Housekeeper;
use App\Models\Inventaris;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'total_kamar'       => Kamar::count(),
            'total_penghuni'    => Penghuni::count(),
            'total_housekeeper' => Housekeeper::count(),
            'total_inventaris'  => Inventaris::count(),
        ]);
    }
}