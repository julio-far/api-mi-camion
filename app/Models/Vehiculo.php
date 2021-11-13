<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculo';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'modelo',
        'marca',
        'kilometraje',
        'record_servicio',
        'estado'
    ];
}
