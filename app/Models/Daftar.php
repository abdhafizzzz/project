<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    protected $table = 'daftar';

    protected $fillable = [
        'pemohon',
        'nokp',
        'alamat',
        'poskod',
        'daerah_id',
        'notel',
        'nohp',
        'nokad',
        'tahunpohon',
        'rd_daftar',
        'ch_musim',
        'ch_musim2',
        'tarikh',
    ];

    protected $casts = [
        'pemohon' => 'integer',
        'nokp' => 'integer',
        'alamat' => 'integer',
        'poskod' => 'integer',
        'daerah_id' => 'integer',
        'notel' => 'integer',
        'nohp' => 'integer',
        'nokad' => 'integer',
        'tahunpohon' => 'integer',
        'rd_daftar' => 'integer',
        'ch_musim' => 'integer',
        'ch_musim2' => 'integer',
        'tarikh' => 'integer',
    ];
}
