<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comando extends Model
{
    use HasFactory;

    protected $fillable = [
        'comando',
        'executado'
    ];
}
