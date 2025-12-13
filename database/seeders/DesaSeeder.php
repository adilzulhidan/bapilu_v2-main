<?php

// database/seeders/DesaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        // mapping kecamatan_id (sesuai urutan di KecamatanSeederBaru):
        // 1=Cikampek, 2=Banyusari, 3=Jatisari, 4=Kotabaru, 5=Tirtamulya, 6=Jayakerta, 7=Majalaya, 8=Purwasari, 9=Ciampel
        $desa_data = [
            // CIKAMPEK (kecamatan_id 1)
            ['kecamatan_id' => 1, 'nama_desa' => 'Dawuan Timur'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Kalihurip'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Cikampek Kota'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Dawuan Tengah'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Cikampek Selatan'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Cikampek Pusaka'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Cikampek Barat'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Cikampek Timur'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Kamojing'],
            ['kecamatan_id' => 1, 'nama_desa' => 'Dawuan Barat'],
            
            // BANYUSARI (kecamatan_id 2)
            ['kecamatan_id' => 2, 'nama_desa' => 'Gembongan'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Gempol'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Gempol Kolot'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Banyuasih'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Kertaraharja'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Tanjung'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Jayamukti'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Cicinde Utara'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Cicinde Selatan'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Mekarasih'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Talunjaya'],
            ['kecamatan_id' => 2, 'nama_desa' => 'Pamekaran'],

            // JATISARI (kecamatan_id 3)
            ['kecamatan_id' => 3, 'nama_desa' => 'Mekarsari'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Jatisari'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Barugbug'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Cikalongsari'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Cirejag'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Jatibaru'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Jatiragas'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Jatiwangi'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Kalijati'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Balonggandu'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Pacing'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Situdam'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Sukamekar'],
            ['kecamatan_id' => 3, 'nama_desa' => 'Telarsari'],
            
            // KOTABARU (kecamatan_id 4)
            ['kecamatan_id' => 4, 'nama_desa' => 'Wancimekar'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Pangulah Selatan'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Pangulah Utara'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Pangulah Baru'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Pucung'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Jomin Timur'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Jomin Barat'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Sarimulya'],
            ['kecamatan_id' => 4, 'nama_desa' => 'Cikampek Utara'],
            
            // TIRTAMULYA (kecamatan_id 5)
            ['kecamatan_id' => 5, 'nama_desa' => 'Citarik'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Karangsinom'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Karangjaya'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Parakan'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Parakanmulya'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Kamurang'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Cipondoh'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Kertawaluya'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Bojongsari'],
            ['kecamatan_id' => 5, 'nama_desa' => 'Tirtasari'],
        ];

        DB::table('tbl_desa')->insertOrIgnore($desa_data);
    }
}