<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rie_Amenaza extends Model
{
    use HasFactory;

    protected $table = 'rie_amenaza';
    public $timestamps = false;
    protected $primaryKey = 'ID_AMENAZA';
    protected $fillable = [
        'AMENAZA'
    ];
}
