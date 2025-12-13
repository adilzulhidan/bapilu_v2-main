<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dapil;

class PemiluController extends Controller
{
    // Ambil semua data nested
    public function index()
    {
        $data = Dapil::with(['kecamatan.desa.tps'])->get();
        return response()->json($data);
    }

    // Ambil berdasarkan Dapil
    public function byDapil($id)
    {
        $dapil = Dapil::with(['kecamatan.desa.tps'])->find($id);

        if (!$dapil) {
            return response()->json(['message' => 'Dapil tidak ditemukan'], 404);
        }

        return response()->json($dapil);
    }

    // Ambil berdasarkan nama Kecamatan (case insensitive)
    public function searchKecamatanByName($nama)
    {
        $kecamatan = \App\Models\Kecamatan::with(['desa.tps'])
            ->whereRaw('LOWER(TRIM(nama_kecamatan)) = ?', [strtolower(trim($nama))])
            ->get();

        if ($kecamatan->isEmpty()) {
            return response()->json(['message' => 'Kecamatan tidak ditemukan'], 404);
        }

        return response()->json($kecamatan);
    }

    // Ambil berdasarkan nama Desa (case insensitive)
    public function searchDesaByName($nama)
    {
        $desa = \App\Models\Desa::with('tps')
            ->whereRaw('LOWER(TRIM(nama_desa)) = ?', [strtolower(trim($nama))])
            ->get();

        if ($desa->isEmpty()) {
            return response()->json(['message' => 'Desa tidak ditemukan'], 404);
        }

        return response()->json($desa);
    }
}
