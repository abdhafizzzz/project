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
        // Other fillable attributes
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
