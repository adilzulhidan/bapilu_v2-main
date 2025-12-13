<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_anggota', function (Blueprint $table) {
            $table->id();

            $table->string('jabatan')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->date('tanggal_lahir')->nullable();
            $table->integer('usia')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_tlp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan_desa')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_anggota');
    }
};
