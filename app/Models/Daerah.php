<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = 'daerah';
    protected $primaryKey = 'koddaerah';

    // Define any relationships or additional methods here
    public function tanah()
    {
        return $this->hasMany(PetaniBajak::class, 'daerah', 'koddaerah');
    }
}
