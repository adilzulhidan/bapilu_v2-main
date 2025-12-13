<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota; 

class AnggotaController extends Controller
{
    public function index()
    {
        // SEBELUMNYA (Ini penyebab error):
        // $data_anggota = Anggota::all();

        // UBAH JADI INI (Solusi):
        $data_anggota = Anggota::paginate(10); 

        return view('admin.anggota.index', compact('data_anggota'));
    }
}