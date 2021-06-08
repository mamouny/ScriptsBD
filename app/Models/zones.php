<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zones extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'libelle_ar', 'commune_id', 'ship_file'];
}
