<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Beri tahu laravel nama tabelnya
    protected $table = 'tbl_anggota';

    // Izinkan semua kolom diisi (atau sebutkan satu per satu di fillable)
    protected $guarded = [];
}