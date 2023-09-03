<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stesen extends Model
{
    protected $table = 'stesen';
    protected $primaryKey = 'stationcode';

    // Define any relationships or additional methods here
    public function tanah()
    {
        return $this->hasMany(Tanah::class, 'stesen', 'stationcode');
    }
}
