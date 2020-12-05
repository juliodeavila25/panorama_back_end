<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rie_Observacion extends Model
{
    use HasFactory;
    protected $table = 'rie_observaciones';
    public $timestamps = false;
    protected $primaryKey = 'ID_OBSERVACION';
    protected $fillable = [
        'OBSERVACION'
    ];
}
