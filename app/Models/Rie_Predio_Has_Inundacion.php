<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rie_Predio_Has_Inundacion extends Model
{
    use HasFactory;
    protected $table = 'rie_predio_has_inundacion';
    public $timestamps = false;
    protected $fillable = [
        'ID_PREDIO',
        'ID_INUNDACION'
    ];
}
