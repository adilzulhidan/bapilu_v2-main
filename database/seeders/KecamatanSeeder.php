<?php

// database/seeders/KecamatanSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        // dapil_id: 1 (Karawang 5), 2 (Karawang 2), 3 (Karawang 6)
        $kecamatans = [
            // Dapil 5
            ['dapil_id' => 1, 'nama_kecamatan' => 'Cikampek'],      // ID 1
            ['dapil_id' => 1, 'nama_kecamatan' => 'Banyusari'],     // ID 2
            ['dapil_id' => 1, 'nama_kecamatan' => 'Jatisari'],      // ID 3
            ['dapil_id' => 1, 'nama_kecamatan' => 'Kotabaru'],      // ID 4
            ['dapil_id' => 1, 'nama_kecamatan' => 'Tirtamulya'],    // ID 5
            
            // Dapil 2
            ['dapil_id' => 2, 'nama_kecamatan' => 'Jayakerta'],     // ID 6

            // Dapil 6
            ['dapil_id' => 3, 'nama_kecamatan' => 'Majalaya'],      // ID 7
            ['dapil_id' => 3, 'nama_kecamatan' => 'Purwasari'],     // ID 8
            ['dapil_id' => 3, 'nama_kecamatan' => 'Ciampel'],       // ID 9
        ];

        DB::table('tbl_kecamatan')->insertOrIgnore($kecamatans);
    }
}