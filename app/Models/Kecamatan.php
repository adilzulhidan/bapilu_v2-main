<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'tbl_kecamatan';
    protected $fillable = ['dapil_id', 'nama_kecamatan'];

    public function dapil()
    {
        return $this->belongsTo(Dapil::class, 'dapil_id');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'kecamatan_id');
    }
}
