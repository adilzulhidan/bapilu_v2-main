<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    protected $table = 'tbl_tps';
    protected $fillable = ['desa_id', 'nama_tps', 'jumlah_suara', 'keterangan'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
