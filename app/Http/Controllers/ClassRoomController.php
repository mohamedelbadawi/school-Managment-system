<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeClassroomRequest;
use App\Http\Requests\updateClassroomRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {

        $grades = Grade::with(['classrooms'])->get();
        return view('classroom.index', compact('grades'));
    }

    public function storeClassroom(storeClassroomRequest $request)
    {
        try {
            $classroom = ClassRoom::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'level_id' => $request->level_id,
                'grade_id' => $request->grade_id
            ]);
            $classroom->teachers()->attach($request->teachers);
            toastr()->success('Classroom created successfullly');
            return redirect()->route('classroom.index');
        } catch (\Throwable $th) {
            toastr()->error('Classroom can\'t created right now ');
            return redirect()->route('classroom.index');
        }
    }

    public function updateClassroom(updateClassroomRequest $request, ClassRoom $classRoom)
    {


        try {


            $classRoom->update([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'grade_id' => $request->grade_id,
                'level_id' => $request->level_id,
                'status' => $request->status
            ]);
            $classRoom->teachers()->sync($request->teachers);
            toastr()->success('Classroom updated successfullly');
            return redirect()->route('classroom.index');
        } catch (\Throwable $th) {
            toastr()->error('Classroom can\'t updated right now ');
            return redirect()->route('classroom.index');
        }
    }
    public function deleteClassroom(ClassRoom $classRoom)
    {
        try {
            $classRoom->delete();
            toastr()->success('Classroom deleted successfullly');
            return redirect()->route('classroom.index');
        } catch (\Throwable $th) {
            toastr()->error('Classroom can\'t deleted right now ');
            return redirect()->route('classroom.index');
        }
    }

    public function getClassroomStudents(ClassRoom $classRoom)
    {
        try {
            $students = $classRoom->students;
            return view('classroom.students', compact('students'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
