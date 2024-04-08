<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $fillable = [
    'nombre',
    'descripcion',
    'carrera_id'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id','id');
    }
}
