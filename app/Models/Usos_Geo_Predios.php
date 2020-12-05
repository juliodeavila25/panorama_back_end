<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usos_Geo_Predios extends Model
{
    use HasFactory;
    protected $table = 'usos_geo_predios';
    public $timestamps = false;
    protected $primaryKey = 'ID_PREDIO';
    protected $fillable = [
        'REFCATASTRAL',
        'DIRECCION',
        'ID_BARRIO',
    ];
}
