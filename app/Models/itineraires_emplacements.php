<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itineraires_emplacements extends Model
{
    use HasFactory;

    protected $fillable = [
        'emplacement_id',
        'itineraire_id',
        'ordre',
        'updated_at',
        'created_at',
    ];

}
