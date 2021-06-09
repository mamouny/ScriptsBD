<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID',
        'COMMUNE',
        'Zone',
        'EMP',
        'Coordonnées_GPS',
        'Nom_emp_fr',
        'Nom_de_emplacement',
    ];
}
