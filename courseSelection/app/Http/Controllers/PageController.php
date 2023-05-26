<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use App\Models\CourseInfo;

class PageController extends Controller
{
    public function index() {
        return view('page.index');
    }

    public function addCoursePage() {
        if(auth()->check()) {
            return view('page.addCoursePage');
        }
        else
            return view('user.loginPage');
    }

    public function addCourse(Request $request) {
        // return $request->all();
        // return auth()->user()->id;

        $days = ['Mon', 'Tues', 'Thrs', 'Wend', 'Fri'];
        $times = [];
        foreach($days as $day) {
            for($i = 1; $i <= 8; $i++) {
                $time = $day . '_' . $i;
                if($request->$time == 'Y') {
                    $count = CourseInfo::where('time', $time)
                                        ->where('teacherId', auth()->user()->id)
                                        ->count(); 
                    if($count > 0) {
                        return back()->withErrors([
                            'message' => $request->classRoom . $time . '老師你有排課'
                        ]);
                    }
                    
                    $count = CourseInfo::where('time', $time)
                                        ->where('classroom', $request->classRoom)
                                        ->count(); 
                    if($count > 0) {
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

        foreach($times as $time) {
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

    public function myClassPage() {
        if(auth()->check()){
            $days = ['Mon', 'Tues', 'Thrs', 'Wend', 'Fri'];
            $times = [];
            foreach($days as $day) {
                for($i = 1; $i <= 8; $i++) {
                    $time = $day . '_' . $i;
                    $count;
                    if(auth()->user()->permissions == 1) {
                        $count = CourseInfo::where('time', $time)
                                            ->where('teacherId', auth()->user()->id)
                                            ->count(); 
                    }
                    if($count == 1) 
                        array_push($times, $time);
                }
            }
    
            // return $times;
            $data = [
                'times' => $times
            ];
            return view('page.myClassPage', $data);
        }
        else
            return view('user.loginPage');
    }
}
