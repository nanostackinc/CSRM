<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_ extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'relation_id',
        'name',
        'occupation',
        'address',
        'phone',
    ];
}
