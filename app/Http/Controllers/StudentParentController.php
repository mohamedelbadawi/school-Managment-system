<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentParentController extends Controller
{
    public function addParent()
    {

        return view('parent.create');
    }
}
