<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itineraires extends Model
{
    use HasFactory;


    protected $fillable = [
        'libelle',
        'libelle_ar',
        'updated_at',
        'created_at',
    ];
}
