<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'date',
        'event',
        'notes',
        'photo_url',
    ];
}
