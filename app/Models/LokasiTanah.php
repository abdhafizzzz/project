<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiTanah extends Model
{
    protected $table = 'lokasitanah';
    protected $primaryKey = 'id';

    // Define any relationships or additional methods here
    public function tanah()
    {
        return $this->hasMany(Tanah::class, 'lokasi', 'id');
    }
}
