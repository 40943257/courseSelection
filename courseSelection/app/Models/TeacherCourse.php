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

    public function incrementNowStudentNum()
    {

        if ($this->nowStudentNum >= $this->maxStudentNum) {
            return 'full';
        }

        $this->increment('nowStudentNum');
        return 'ok';
    }

    public function decrementNowStudentNum()
    {
        $this->decrement('nowStudentNum');
    }

    protected $table = 'teacher_courses';
}
