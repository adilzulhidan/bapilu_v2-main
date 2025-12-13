<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TblAnggotaSeeder::class,
            DapilSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
            TpsSeeder::class,
            CoordinatesSeeder::class,
        ]);
    }
}
