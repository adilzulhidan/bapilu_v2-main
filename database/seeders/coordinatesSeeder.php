<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update koordinat kecamatan
        $kecamatanData = [
            'Cikampek'   => '-6.400,107.444',
            'Banyusari'  => '-6.30948,107.53490',
            'Jatisari'   => '-6.3625, 107.5290',
            'Kotabaru'   => '-6.40040,107.48081',
            'Tirtamulya' => '-6.354,107.480',
        ];

        foreach ($kecamatanData as $kecamatan => $koordinat) {
            DB::table('tbl_kecamatan')
                ->where('nama_kecamatan', $kecamatan)
                ->update(['koordinat_kecamatan' => $koordinat]);
        }

        // Update koordinat desa (lebih normal)
        $desaData = [
            // Banyusari
            ['nama_desa' => 'Gembongan', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.2989,107.5386'],
            ['nama_desa' => 'Gempol', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.2971,107.5653'],
            ['nama_desa' => 'Gempol Kolot', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.2966,107.5771'],
            ['nama_desa' => 'Banyuasih', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3004,107.5261'],
            ['nama_desa' => 'Kertaraharja', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3085,107.5003'],
            ['nama_desa' => 'Tanjung', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.2913,107.5091'],
            ['nama_desa' => 'Jayamukti', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3097,107.5683'],
            ['nama_desa' => 'Cicinde Utara', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3228,107.5594'],
            ['nama_desa' => 'Cicinde Selatan', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3330,107.5594'],
            ['nama_desa' => 'Mekarasih', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3183,107.5472'],
            ['nama_desa' => 'Talunjaya', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.2934,107.5239'],
            ['nama_desa' => 'Pamekaran', 'kecamatan' => 'Banyusari', 'koordinat' => '-6.3211,107.5328'],

            // Cikampek
            ['nama_desa' => 'Cikampek Pusaka', 'kecamatan' => 'Cikampek', 'koordinat' => '-6.41785,107.45495'],
            ['nama_desa' => 'Cikampek Barat', 'kecamatan' => 'Cikampek', 'koordinat' => '-6.3961,107.4564'],
            ['nama_desa' => 'Cikampek Timur', 'kecamatan' => 'Cikampek', 'koordinat' => '-6.4128,107.4631'],
            ['nama_desa' => 'Kamojing', 'kecamatan' => 'Cikampek', 'koordinat' => '-6.4343,107.4329'],
            ['nama_desa' => 'Dawuan Barat', 'kecamatan' => 'Cikampek', 'koordinat' => '-6.39667,107.42309'],

            // Jatisari
            ['nama_desa' => 'Jatiwangi',    'kecamatan' => 'Jatisari', 'koordinat' => '-6.35056,107.55556'],
            ['nama_desa' => 'Kalijati',     'kecamatan' => 'Jatisari', 'koordinat' => '-6.35820,107.50178'],
            ['nama_desa' => 'Balonggandu',  'kecamatan' => 'Jatisari', 'koordinat' => '-6.38167,107.51111'],
            ['nama_desa' => 'Pacing',       'kecamatan' => 'Jatisari', 'koordinat' => '-6.32750,107.51806'],
            ['nama_desa' => 'Situdam',      'kecamatan' => 'Jatisari', 'koordinat' => '-6.39028,107.52694'],
            ['nama_desa' => 'Sukamekar',    'kecamatan' => 'Jatisari', 'koordinat' => '-6.32889,107.49778'],
            ['nama_desa' => 'Telarsari',    'kecamatan' => 'Jatisari', 'koordinat' => '-6.34833,107.51500'],

            // Kotabaru
            ['nama_desa' => 'Wancimekar',      'kecamatan' => 'Kotabaru', 'koordinat' => '-6.39306,107.47917'],
            ['nama_desa' => 'Pangulah Baru',   'kecamatan' => 'Kotabaru', 'koordinat' => '-6.37889,107.49778'],
            ['nama_desa' => 'Pangulah Utara',   'kecamatan' => 'Kotabaru', 'koordinat' => '-6.39181,107.49174'],
            ['nama_desa' => 'Pangulah Baru',    'kecamatan' => 'Kotabaru', 'koordinat' => '-6.38509,107.49890'],
            ['nama_desa' => 'Pucung',           'kecamatan' => 'Kotabaru', 'koordinat' => '-6.39583,107.47083'],
            ['nama_desa' => 'Jomin Timur',      'kecamatan' => 'Kotabaru', 'koordinat' => '-6.41331,107.48856'],
            ['nama_desa' => 'Jomin Barat',      'kecamatan' => 'Kotabaru', 'koordinat' => '-6.40898,107.48501'],
            ['nama_desa' => 'Sarimulya',        'kecamatan' => 'Kotabaru', 'koordinat' => '-6.41889,107.46917'],
            ['nama_desa' => 'Cikampek Utara',   'kecamatan' => 'Kotabaru', 'koordinat' => '-6.40058,107.46085'],

            // Tirtamulya
            ['nama_desa' => 'Citarik',       'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.35639,107.46194'],
            ['nama_desa' => 'Karangsinom',   'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.36472,107.44444'],
            ['nama_desa' => 'Karangjaya',    'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.37056,107.46139'],
            ['nama_desa' => 'Parakan',       'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.33278,107.47000'],
            ['nama_desa' => 'Parakanmulya',  'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.36556,107.47833'],
            ['nama_desa' => 'Kamurang',      'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.35417,107.49333'],
            ['nama_desa' => 'Cipondoh',      'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.30944,107.46167'],
            ['nama_desa' => 'Kertawaluya',   'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.30417,107.47667'],
            ['nama_desa' => 'Bojongsari',    'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.32667,107.45444'],
            ['nama_desa' => 'Tirtasari',     'kecamatan' => 'Tirtamulya', 'koordinat' => '-6.34278,107.44306'],

        ];

        foreach ($desaData as $item) {
            DB::table('tbl_desa')
                ->whereIn('kecamatan_id', function ($query) use ($item) {
                    $query->select('id')
                        ->from('tbl_kecamatan')
                        ->where('nama_kecamatan', $item['kecamatan']);
                })
                ->where('nama_desa', $item['nama_desa'])
                ->update([
                    'koordinat_desa' => $item['koordinat']
                ]);
        }
    }
}
