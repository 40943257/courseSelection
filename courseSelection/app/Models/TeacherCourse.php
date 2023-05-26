<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacherId',
        'maxStudentNum',         
        'nowStudentNum',        
        'credit',               
        'relate',   
    ];

    protected $table = 'teacher_courses';
}
