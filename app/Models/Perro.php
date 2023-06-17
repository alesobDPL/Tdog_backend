<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interaccion;

class Perro extends Model
{
    use HasFactory;
    protected $table = 'perro';
    

    public function interaccion()
    {
        return $this->hasMany(Interaccion::class);
    }

    
}
