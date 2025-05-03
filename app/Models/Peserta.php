<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';

    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'nama_peserta',
        'nik_ktp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pendidikan',
        'no_wa',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'tempat_tinggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
