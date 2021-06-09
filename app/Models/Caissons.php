<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caissons extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type_caisson_id',
        'date_acquisition',
        'volume',
        'cout_acquisition',
        'updated_at',
        'created_at',
    ];
}
