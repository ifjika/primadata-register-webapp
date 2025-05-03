<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    public $timestamps = false;

    protected $fillable = [
        'id_laporan',
        'periode',
        'jumlah_peserta',
        'omset'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
