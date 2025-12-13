<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_kecamatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dapil_id')->constrained('tbl_dapil')->onDelete('cascade');
            $table->string('nama_kecamatan');
            $table->string('koordinat_kecamatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_kecamatan');
    }
};
