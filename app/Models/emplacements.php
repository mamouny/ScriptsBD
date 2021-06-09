<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emplacements extends Model
{
    use HasFactory;

    protected $fillable = ['code','libelle','libelle_ar','zone_id','coordonnees_gps','etat','priorite','description'];
}
