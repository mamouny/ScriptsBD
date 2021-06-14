<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    use HasFactory;

    protected $fillable = [
        'nni',
        'nom',
        'prenom',
        'dateN',
        'genre',
        'lieuN',
        'etat_civil',
        'telephone',
        'fonction_id',
        'niveau',
        'langues',
        'categories',
        'updated_at',
        'created_at',
    ];
}
