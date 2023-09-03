<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilikan extends Model
{
    protected $table = 'pemilikan';
    protected $primaryKey = 'kodmilik';

    // Define any relationships or additional methods here
    public function tanah()
    {
        return $this->hasMany(Tanah::class, 'pemilikan', 'kodmilik');
    }
}
