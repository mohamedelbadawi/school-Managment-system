<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $students = Student::where('student_parent_id', auth()->id())->with(['payments'])->get();
        return view('parent.payment.index', compact('students'));
    }
}
