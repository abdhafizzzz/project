<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaniBajak extends Model
{
    protected $table = 'petanibajak';

    protected $primaryKey = 'petanibajak_id';

    protected $fillable = [
        'petanibajak_id',
        'nokp',
        'pohonid',
    ];

    public function tanah()
    {
        return $this->hasOne(tanah::class, 'nokppetani', 'nokp');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'nokp', 'nokp');
    }
}
