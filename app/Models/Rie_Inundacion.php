<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rie_Inundacion extends Model
{
    use HasFactory;
    protected $table = 'rie_inundacion';
    public $timestamps = false;
    protected $primaryKey = 'ID_INUNDACION';
    protected $fillable = [
        'INUNDACION'
    ];
}
