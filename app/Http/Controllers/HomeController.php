<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {

        $data['students'] = Student::count();
        $data['teachers'] = Teacher::count();
        $data['parents'] = StudentParent::count();

        return view('dashboard', compact('data'));
    }
}
