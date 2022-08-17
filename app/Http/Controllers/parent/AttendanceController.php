<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $students = Student::where('student_parent_id', auth('parent')->id())->with(['attendance'])->get();
        return view('parent.attendance.index', compact('students'));
    }
}
