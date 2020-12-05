<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usos_Direcciones extends Model
{
    use HasFactory;
    protected $table = 'usos_direcciones';
    public $timestamps = false;
    protected $primaryKey = 'ID_DIRECCION';
    protected $fillable = [
        'ID_PREDIO',
        'DIRECCION_IGAC',
        'DIRECCION_STD',
        'REVISAR',
        'DIRECCION',
        'REF_CATASTRAL',
        'DESCRIPCION'
    ];
}
