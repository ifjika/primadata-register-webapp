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
        'ijazah',
        'kk',
        'ktp',
        'pas_foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
