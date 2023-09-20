<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parent_ extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'relation_id',
        'name',
        'occupation',
        'address',
        'phone',
    ];
}
