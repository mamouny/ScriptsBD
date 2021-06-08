<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types_Tournees extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'libelle',
        'libelle_ar'
    ];
}
