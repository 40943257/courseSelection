<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use App\Models\StudentCourse;
use App\Models\CourseInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\AddCourseRequest;
use App\Http\Requests\SearchResultsPageRequest;
use App\Http\Requests\CourseSelectRequest;

class PageController extends Controller
{
    public function index()
    {
        return view('page.index');
    }

    public function addCoursePage()
    {
        return view('page.addCoursePage');
    }

    public function addCourse(AddCourseRequest $request)
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

        return redirect()->route('page.myCurriculumPage');
    }

    public function myCurriculumPage()
    {
        if (auth()->user()->permissions == 1) {
            $results = DB::table('teacher_courses')
                ->select('users.name as teacherName', 'teacher_courses.name as courseName', 'course_infos.classroom', 'course_infos.time')
                ->join('course_infos', 'teacher_courses.id', '=', 'course_infos.id')
                ->join('users', 'teacher_courses.teacherId', '=', 'users.id')
                ->where('teacher_courses.teacherId', '=', auth()->user()->id)
                ->get();
        } else if (auth()->user()->permissions == 2) {
            $results = DB::table('student_courses')
                ->select('users.name as teacherName', 'teacher_courses.name as courseName', 'course_infos.classroom', 'course_infos.time')
                ->join('teacher_courses', 'student_courses.courseId', '=', 'teacher_courses.id')
                ->join('course_infos', 'teacher_courses.id', '=', 'course_infos.id')
                ->join('users', 'teacher_courses.teacherId', '=', 'users.id')
                ->where('student_courses.studentId', '=', auth()->user()->id)
                ->get();
        }

        $data = [
            'results' => $results
        ];
        return view('page.myCurriculumPage', $data);
    }

    public function searchCoursePage()
    {
        return view('page.searchCoursePage');
    }

    public function searchResultsPage(SearchResultsPageRequest $request)
    {
        $results = DB::table('users')
            ->select(
                'teacher_courses.id',
                'users.name as teacherName',
                'teacher_courses.name as courseName',
                'teacher_courses.maxStudentNum',
                'teacher_courses.nowStudentNum',
                'teacher_courses.credit',
                'teacher_courses.relate',
                'course_infos.classroom',
                DB::raw('GROUP_CONCAT(course_infos.time) as times')
            )
            ->join('teacher_courses', 'teacher_courses.teacherId', '=', 'users.id')
            ->join('course_infos', 'course_infos.id', '=', 'teacher_courses.id')
            ->where('users.permissions', 1)
            ->groupBy('id', 'teacherName', 'courseName', 'maxStudentNum', 'nowStudentNum', 'credit', 'relate', 'classroom');
        if ($request->courseId != '')
            $results->where('teacher_courses.id', $request->courseId);
        if ($request->courseName != '')
            $results->where('teacher_courses.name', 'LIKE', '%' . $request->courseName . '%');
        if ($request->teacherName != '')
            $results->where('users.name', 'LIKE', '%' . $request->teacherName . '%');
        if ($request->credit != -1)
            $results->where('teacher_courses.credit', $request->credit);

        $results = $results->get();

        if ($request->day != '-1') {
            $results = $results->filter(function ($result) use ($request) {
                return Str::contains($result->times, $request->day);
            });
        }

        $data = [
            'results' => $results
        ];
        return view('page.searchResultsPage', $data);
    }

    public function courseSelect(CourseSelectRequest $request)
    {
        // return $request->courseId;

        $count = StudentCourse::where('courseId', $request->courseId)
            ->where('studentId', auth()->user()->id)
            ->count();

        if ($count != 0) {
            return back()->withErrors([
                'message' => '你已經選了 id = ' . $request->courseId . ' 的課程'
            ]);
        }

        $results = DB::table('student_courses')
            ->select('course_infos.time')
            ->join('course_infos', 'course_infos.id', '=', 'student_courses.courseId')
            ->where('student_courses.studentId', auth()->user()->id)
            ->get();
        $results2 = CourseInfo::select('time')
            ->where('id', $request->courseId)
            ->get();
        foreach ($results2 as $result2) {
            foreach ($results as $result) {
                if ($result->time == $result2->time) {
                    return back()->withErrors([
                        'message' => '這個時間 ' . $result->time . ' 有課'
                    ]);
                }
            }
        }

        $teacherCourse = TeacherCourse::find($request->courseId);
        $result =  $teacherCourse->incrementNowStudentNum();
        if ($result == 'full') {
            return back()->withErrors([
                'message' => '以滿人 '
            ]);
        }

        $data = [
            'studentId' =>  auth()->user()->id,
            'courseId'  =>  $request->courseId,
        ];

        StudentCourse::create($data);

        return redirect()->route('page.myCurriculumPage');
    }

    public function myCoursePage()
    {
        if (auth()->user()->permissions == 1) {
            $results = DB::table('teacher_courses')
                ->select(
                    'teacher_courses.id',
                    'teacher_courses.name as courseName',
                    'teacher_courses.maxStudentNum',
                    'teacher_courses.credit',
                    'teacher_courses.relate',
                    'course_infos.classroom',
                    DB::raw('GROUP_CONCAT(course_infos.time) as times')
                )
                ->join('course_infos', 'course_infos.id', '=', 'teacher_courses.id')
                ->where('teacher_courses.teacherId', auth()->user()->id)
                ->groupBy('id', 'courseName', 'maxStudentNum', 'credit', 'relate', 'classroom')
                ->get();
        } else if (auth()->user()->permissions == 2) {
            $results = DB::table('student_courses')
                ->select(
                    'teacher_courses.id',
                    'teacher_courses.name as courseName',
                    'users.name as teacherName',
                    'teacher_courses.maxStudentNum',
                    'course_infos.classroom',
                    'teacher_courses.credit',
                    'teacher_courses.relate',
                    DB::raw('GROUP_CONCAT(course_infos.time) as times')
                )
                ->join('teacher_courses', 'student_courses.courseId', '=', 'teacher_courses.id')
                ->join('course_infos', 'teacher_courses.id', '=', 'course_infos.id')
                ->join('users', 'teacher_courses.teacherId', '=', 'users.id')
                ->where('student_courses.studentId', '=', auth()->user()->id)
                ->groupBy('id', 'courseName', 'teacherName', 'maxStudentNum', 'credit', 'relate', 'classroom')
                ->get();
            // return $results;
        }
        $data = [
            'results' =>  $results
        ];
        return view('page.myCoursePage', $data);
    }

    public function deleteCourse(TeacherCourse $teacherCourse)
    {
        if (auth()->user()->permissions == 1) {
            if ($teacherCourse->teacherId == auth()->user()->id) {
                StudentCourse::where('courseId', $teacherCourse->id)->delete();
                CourseInfo::where('id', $teacherCourse->id)->delete();
                $teacherCourse->delete();
            } else {
                return back()->withErrors([
                    'message' => '這不是你的課程'
                ]);
            }
        } else if (auth()->user()->permissions == 2) {
            $count = StudentCourse::where('courseId', $teacherCourse->id)
                ->where('studentId', auth()->user()->id)
                ->delete();
            if ($count == 1)
                $teacherCourse->decrementNowStudentNum();
        }
        return back();
    }
}
