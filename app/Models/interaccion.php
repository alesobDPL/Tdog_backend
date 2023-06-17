<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Perro;

class Interaccion extends Model
{
    use HasFactory;
    public $table = 'interaccion';
    protected $primaryKey = 'id';
    public $incrementing = true;


    public function perroInteresado()
    {
        return $this->belongsTo(Perro::class, 'perro_interesado_id');
    }

    public function perroCandidato()
    {
        return $this->belongsTo(Perro::class, 'perro_candidato_id');
    }

}
