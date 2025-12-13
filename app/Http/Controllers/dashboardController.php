<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tps;        // Pastikan Model di-import
use App\Models\Kecamatan;  // Pastikan Model di-import
use App\Models\Desa;       // Pastikan Model di-import

class DashboardController extends Controller
{
    public function index()
    {
        // --- 1. HITUNG STATISTIK (Supaya variabel $menang ada isinya) ---
        $menang = Tps::where('keterangan', 'menang')->count();
        $cukup  = Tps::where('keterangan', 'cukup')->count();
        $kurang = Tps::where('keterangan', 'kurang')->count();

        // Hitung Persentase
        $total = $menang + $cukup + $kurang;
        $persentase = $total > 0 ? round(($menang / $total) * 100) : 0;

        // --- 2. AMBIL DATA UNTUK PETA (Kecamatan & Desa) ---
        $kecamatan = Kecamatan::select('id', 'nama_kecamatan', 'koordinat_kecamatan')
            ->whereNotNull('koordinat_kecamatan')
            ->get()
            ->map(function ($item) {
                if (str_contains($item->koordinat_kecamatan, ',')) {
                    [$lat, $lng] = explode(',', $item->koordinat_kecamatan);
                    $item->lat = floatval(trim($lat));
                    $item->lng = floatval(trim($lng));
                }
                return $item;
            });

        $desa = Desa::select('id', 'kecamatan_id', 'nama_desa', 'koordinat_desa')
            ->whereNotNull('koordinat_desa')
            ->get()
            ->map(function ($item) {
                if (str_contains($item->koordinat_desa, ',')) {
                    [$lat, $lng] = explode(',', $item->koordinat_desa);
                    $item->lat = floatval(trim($lat));
                    $item->lng = floatval(trim($lng));
                }
                return $item;
            });

        // --- 3. KIRIM SEMUA DATA KE VIEW ---
        return view('admin.dashboard', compact(
            'menang', 
            'cukup', 
            'kurang', 
            'persentase', 
            'kecamatan', 
            'desa'
        ));
    }
}