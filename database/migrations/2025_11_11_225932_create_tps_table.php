<?php

// database/migrations/2025_11_11_225932_create_tps_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_tps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('tbl_desa')->onDelete('cascade');
            $table->string('nama_tps');
            $table->integer('jumlah_suara')->default(0);
            $table->enum('keterangan', ['menang', 'cukup', 'kurang'])->nullable();
            // $table->string('koordinat_tps')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_tps');
    }
};
