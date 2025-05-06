<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan konvensi Laravel
    protected $table = 'paket';

    // Tentukan primary key jika berbeda dengan 'id'
    protected $primaryKey = 'id_paket';

    // Tentukan kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_paket',
        'jurusan',
        'biaya',
        'deskripsi',
    ];

    // Mengaktifkan timestamps (created_at dan updated_at)
    public $timestamps = true;
}
