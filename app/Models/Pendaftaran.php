<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    public $timestamps = false; // karena tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'id_peserta',
        'id_paket',
        'tanggal_daftar',
        'status',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket'); // nanti kamu bisa sesuaikan kalau punya model Paket
    }
}
