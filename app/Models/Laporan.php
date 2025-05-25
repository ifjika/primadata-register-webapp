<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $keyType = 'int';

    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'periode',
        'jumlah_peserta',
        'omset',
    ];
}
