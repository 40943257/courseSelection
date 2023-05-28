<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use App\Models\CourseInfo;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view('page.index');
    }

    public function addCoursePage()
    {
        if (auth()->check()) {
            return view('page.addCoursePage');
        } else
            return view('user.loginPage');
    }

    public function addCourse(Request $request)
    {
        // return $request->all();
        // return auth()->user()->id;

        $days = ['Mon', 'Tues', 'Thrs', 'Wend', 'Fri'];
        $times = [];
        foreach ($days as $day) {
            for ($i = 1; $i <= 8; $i++) {
                $time = $day . '_' . $i;
                if ($request->$time == 'Y') {
                    $count = CourseInfo::where('time', $time)
                        ->where('teacherId', auth()->user()->id)
                        ->count();
                    if ($count > 0) {
                        return back()->withErrors([
                            'message' => $request->classRoom . $time . '老師你有排課'
                        ]);
                    }

                    $count = CourseInfo::where('time', $time)
                        ->where('classroom', $request->classRoom)
                        ->count();
                    if ($count > 0) {
                        return back()->withErrors([
                            'message' => $request->classRoom . $time . '有老師排課'
                        ]);
                    }

                    array_push($times, $time);
                }
            }
        }

        $data = [
            'name'                  =>  $request->name,
            'teacherId'             =>  auth()->user()->id,
            'maxStudentNum'         =>  $request->maxStudentNum,
            'nowStudentNum'         =>  0,
            'credit'                =>  $request->credit,
            'relate'                =>  $request->relate
        ];

        $teacherCourse = TeacherCourse::create($data);

        foreach ($times as $time) {
            $data = [
                'id'        =>  $teacherCourse->id,
                'teacherId' =>  auth()->user()->id,
                'classroom' =>  $request->classRoom,
                'time'      =>  $time
            ];
            CourseInfo::create($data);
        }

        return redirect()->route('page.myClassPage');
    }

    public function myClassPage()
    {
        if (auth()->check()) {
            if (auth()->user()->permissions == 1) {
                $results = DB::table('teacher_courses')
                    ->select('users.name as teacherName', 'teacher_courses.name as courseName', 'course_infos.classroom', 'course_infos.time')
                    ->join('course_infos', 'teacher_courses.id', '=', 'course_infos.id')
                    ->join('users', 'teacher_courses.teacherId', '=', 'users.id')
                    ->where('teacher_courses.teacherId', '=', auth()->user()->id)
                    ->get();
            } else if (auth()->user()->permissions == 2) {
                $results = [];
                // $results = DB::table('student_courses')
                //             ->select('users.name as teacherName', 'student_courses.name as courseName', 'course_infos.classroom', 'course_infos.time')
                //             ->join('course_infos', 'student_courses.id', '=', 'course_infos.id')
                //             ->join('users', 'student_courses.teacherId', '=', 'users.id')
                //             ->where('student_courses.teacherId', '=', auth()->user()->id)
                //             ->get();
            }

            $data = [
                'results' => $results
            ];
            return view('page.myClassPage', $data);
        } else
            return view('user.loginPage');
    }

    public function searchCoursePage()
    {
        if (auth()->check()) {
            return view('page.searchCoursePage');
        } else {
            return view('user.loginPage');
        }
    }

    public function courseSelectPage()
    {
        if (auth()->check()) {
            return view('page.courseSelectPage');
        } else {
            return view('user.loginPage');
        }
    }
}
