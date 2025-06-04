<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';

    protected $primaryKey = 'id_berkas';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_pendaftaran',
        'ijazah',
        'kk',
        'ktp',
        'pas_foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
