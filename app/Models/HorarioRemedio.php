<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioRemedio extends Model
{
    use HasFactory;

    protected $fillable = ['remedio_id', 'data_hora'];
}
