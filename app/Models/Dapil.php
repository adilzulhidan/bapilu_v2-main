<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dapil extends Model
{
    protected $table = 'tbl_dapil';
    protected $fillable = ['daerah_pemilihan', 'keterangan'];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'dapil_id');
    }
}
