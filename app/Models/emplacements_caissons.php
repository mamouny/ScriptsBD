<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emplacements_caissons extends Model
{
    use HasFactory;
    protected $fillable = [
        'emplacement_id',
        'caisson_id',
        'ordre',
        'updated_at',
        'created_at',
    ];
    
}
