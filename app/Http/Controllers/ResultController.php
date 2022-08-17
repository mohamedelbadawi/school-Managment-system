<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function showStudentQuizzesResult(Student $student)
    {
        $results = Result::where('student_id', $student->id)->with(['quiz'])->get();
        return view('parent.results.index', compact('results'));
    }
}
