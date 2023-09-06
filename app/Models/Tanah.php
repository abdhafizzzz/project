<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    protected $table = 'tanah';

    protected $primaryKey = 'table_id';

    protected $fillable = [
        'nokppetani',
        'bil',
        'pohonid',
        'pemilikgeran',
        'nogeran',
        'lokasi',
        'luasekar',
        'luaspohon',
        'pemilikan',
        'nopetani',
        'nokppetani',
        'zon',
        'mukim',
        'kawasan',
        'stesen',
        'noakaun',
        'bank',
        'bankcwgn',
        'tahunpohon',
        'tarikh',
        'table_id',
    ];

    public function petaniBajak()
    {
        return $this->belongsTo(PetaniBajak::class, 'nokppetani', 'nokp');
    }

    public function lokasiTanah()
    {
        return $this->belongsTo(LokasiTanah::class, 'lokasi', 'id');
    }

    public function pemilikan()
    {
        return $this->belongsTo(Pemilikan::class, 'pemilikan', 'kodmilik');
    }

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah', 'koddaerah');
    }

    public function stesen()
    {
        return $this->belongsTo(Stesen::class, 'stesen', 'stationcode');
    }
}
