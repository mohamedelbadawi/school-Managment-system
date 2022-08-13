<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $classrooms = Auth::guard('teacher')->user()->classrooms;
        return view('attendance.index', compact('classrooms'));
    }
    public function show(ClassRoom $classRoom)
    {

        return view('attendance.classroom', compact('classRoom'));
    }
    public function store(Request $request)
    {
        try {

            $classroom = ClassRoom::findOrFail($request->classroom_id);
            if ($request->attendences != null) {

                foreach ($request->attendences as $key => $value) {
                    Attendance::updateOrCreate([
                        'teacher_id' => auth()->guard('teacher')->id(),
                        'class_room_id' => $classroom->id,
                        'level_id' => $classroom->level->id,
                        'grade_id' => $classroom->grade->id,
                        'attendance_date' => $request->attendance_date ? $request->attendance_date : date('Y-m-d'),
                        'status' => $value,
                        'student_id' => $key
                    ]);
                }
                Attendance::where('class_room_id', $classroom->id)->where('attendance_date', $request->attendance_date ? $request->attendance_date : date('Y-m-d'))->whereNotIn('student_id', array_keys($request->attendences))->delete();
            } else {
                Attendance::where('class_room_id', $classroom->id)->where('attendance_date', $request->attendance_date ? $request->attendance_date : date('Y-m-d'))->delete();
            }

            toastr()->success('attendance taked successfully');
        } catch (\Throwable $th) {
            toastr()->error('something error!');
        }
        return redirect()->back();
    }
}
