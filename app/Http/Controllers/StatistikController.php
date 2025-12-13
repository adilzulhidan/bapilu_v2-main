<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tps; // Pastikan ini ada

class StatistikController extends Controller
{
    public function index()
    {
        // Ambil data TPS, sertakan data Desa-nya, dan paginate 10 baris
        $data_tps = Tps::with('desa')->paginate(10);

        return view('admin.statistik.index', compact('data_tps'));
    }
}