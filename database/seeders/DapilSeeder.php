<?php

// database/seeders/DapilSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DapilSeeder extends Seeder
{
    public function run(): void
    {
        // dapil_id: 1 (Karawang 5), 2 (Karawang 2), 3 (Karawang 6)
        $dapils = [
            ['daerah_pemilihan' => 'Karawang 5', 'keterangan' => 'Wilayah Timur Karawang'], // ID 1
            ['daerah_pemilihan' => 'Karawang 2', 'keterangan' => 'Wilayah Tengah Karawang'], // ID 2
            ['daerah_pemilihan' => 'Karawang 6', 'keterangan' => 'Wilayah Selatan Karawang'], // ID 3
        ];

        // Hati-hati: Gunakan insert atau upsert jika data sudah ada
        DB::table('tbl_dapil')->insertOrIgnore($dapils);
    }
}
