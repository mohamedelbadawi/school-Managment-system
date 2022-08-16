<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = auth()->user()->attendance;
        return view('student.attendance', compact('attendances'));
    }
}
