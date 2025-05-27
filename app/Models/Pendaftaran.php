<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    public $timestamps = true;

    protected $fillable = [
        'id_peserta',
        'id_paket',
        'status',
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'id_peserta');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket', 'id_paket');
    }
}
