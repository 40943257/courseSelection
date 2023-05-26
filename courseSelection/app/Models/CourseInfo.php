<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'teacherId',
        'classroom',
        'time'   
    ];

    protected $table = 'course_infos';
}
