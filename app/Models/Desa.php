<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'tbl_desa';
    protected $fillable = ['kecamatan_id', 'nama_desa'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function tps()
    {
        return $this->hasMany(Tps::class, 'desa_id');
    }
}
