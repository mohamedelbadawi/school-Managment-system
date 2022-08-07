<?php

namespace App\Http\Controllers;

use App\Http\Requests\graduateClassroomRequest;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Upgrade;
use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    public function index()
    {
        $upgrades = Upgrade::with(['student', 'previousLevel', 'previousGrade', 'previousClassroom', 'currentLevel', 'currentGrade', 'currentClassroom'])->get();
        return view('upgrade.index', compact('upgrades'));
    }


    public function upgradeStudent()
    {

        $grades = Grade::all();

        return view('upgrade.upgrade', compact('grades'));
    }

    public function delete(Upgrade $upgrade)
    {
        try {
            $student = $upgrade->student;
            $student->update([
                'grade_id' => $upgrade->from_grade,
                'level_id' => $upgrade->from_level,
                'class_room_id' => $upgrade->from_classroom
            ]);

            $upgrade->delete();
            toastr()->success('upgrade canceld successfully!');
        } catch (\Throwable $th) {
            toastr()->error('can\'t cancel right now');
        }
        return redirect()->route('upgrade.index');
    }
    public function graduateClassroom()
    {
        $grades = Grade::all();

        return view('upgrade.graduate', compact('grades'));
    }
    public function storeGraduationClassroom(graduateClassroomRequest $request)
    {
        try {
            $students = Student::where('class_room_id', $request->classroom_id)->delete();
            toastr()->success('classroom graduated successfully');
        } catch (\Throwable $th) {
            toastr()->error('some thing error!');
        }
        return redirect()->route('student.index');
    }
    public function graduatedStudents()
    {

        return view('upgrade.graduated',);
    }
}
