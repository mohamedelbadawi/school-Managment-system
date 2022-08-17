<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Student;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $students = Student::where('student_parent_id', auth()->id())->with(['invoices'])->get();
        return view('parent.invoice.index', compact('students'));
    }
}
