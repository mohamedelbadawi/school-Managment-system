<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentParentController extends Controller
{

    public function index()
    {

        $sons = auth('parent')->user()->sons;

        return view('parent.dashboard', compact('sons'));
    }
    public function addParent()
    {

        return view('parent.create');
    }
}
