<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_desa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('tbl_kecamatan')->onDelete('cascade');
            $table->string('nama_desa');
            $table->string('koordinat_desa')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_desa');
    }
};
