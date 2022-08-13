<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\StudentParent;
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

            // dd(StudentParent::first());
        $this->middleware('auth');

        return view('dashboard');
    }
}
