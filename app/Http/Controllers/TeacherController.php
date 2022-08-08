<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTeacherRequest;
use App\Http\Requests\updateTeacherRequest;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {

        $teachers = Teacher::all();
        $genders = Gender::all();
        $specializations = Specialization::all();
        return view('teacher.index', compact('teachers', 'genders', 'specializations'));
    }

    public function dashboard()
    {

        return view('teacher.dashboard');
    }

    public function storeTeacher(storeTeacherRequest $request)
    {
        try {
            Teacher::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'joining_date' => $request->joining_date,
                'address' => $request->address,

            ]);
            toastr()->success('teacher created successfully');
            return redirect()->route('teacher.index');
        } catch (\Throwable $th) {
            toastr()->error('teacher can\'t created right now');
            return redirect()->route('teacher.index');
        }
    }

    public function updateTeacher(Teacher $teacher, updateTeacherRequest $request)
    {
        try {

            $teacher->update([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'joining_date' => $request->joining_date,
                'address' => $request->address,
            ]);
            toastr()->success('teacher updated successfully');
            return redirect()->route('teacher.index');
        } catch (\Throwable $th) {
            toastr()->error('teacher can\'t updated right now');
            return redirect()->route('teacher.index');
        }
    }


    public function deleteTeacher(Teacher $teacher)
    {
        try {
            $teacher->delete();
            toastr()->success('teacher deleted successfully');
            return redirect()->route('teacher.index');
        } catch (\Throwable $th) {
            toastr()->error('teacher can\'t updated right now');
            return redirect()->route('teacher.index');
        }
    }
}
