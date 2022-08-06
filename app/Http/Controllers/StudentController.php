<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\BloodType;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Nationalitie;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['classroom', 'grade', 'level', 'gender', 'blood', 'nationality', 'parent'])->get();
        $genders = Gender::all();
        $parents = StudentParent::all();
        $nationalities = Nationalitie::all();
        $bloodTypes = BloodType::all();
        $grades = Grade::all();

        return view('student.index', compact('students', 'genders', 'grades', 'parents', 'nationalities', 'bloodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        try {

            $student = Student::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar,
                ],
                'email' => $request->email,
                'password' => $request->password,
                'blood_type_id' => $request->blood_id,
                'nationalitie_id' => $request->nationlitie_id,
                'student_parent_id' => $request->parent_id,
                'level_id' => $request->level_id,
                'grade_id' => $request->grade_id,
                'class_room_id' => $request->classroom_id,
                'date_birth' => $request->date_birth,
                'gender_id' => $request->gender_id,
            ]);

            if (!empty($request->attachments)) {
                foreach ($request->attachments as $attachment) {
                    $attachment->storeAs($student->id, $attachment->getClientOriginalName(), $disk = 'student_attachments');
                    Image::create(['name' => $attachment->getClientOriginalName(), 'imageable_id' => $student->id, 'imageable_type' => Student::class]);
                }
            }
            toastr()->success('Student created successfully');
            return redirect()->route('student.index');
        } catch (\Throwable $th) {
            toastr()->error('can\'t create student right now');
            return redirect()->route('student.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {

            $student->update([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar,
                ],
                'email' => $request->email,
                'password' => $request->password,
                'blood_type_id' => $request->blood_id,
                'nationalitie_id' => $request->nationlitie_id,
                'student_parent_id' => $request->parent_id,
                'level_id' => $request->level_id,
                'grade_id' => $request->grade_id,
                'class_room_id' => $request->classroom_id,
                'date_birth' => $request->date_birth,
                'gender_id' => $request->gender_id,
            ]);
            toastr()->success('Student updated successfully');
            return redirect()->route('student.index');
        } catch (\Throwable $th) {
            toastr()->error('can\'t update student right now');
            return redirect()->route('student.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            toastr()->success('Student deleted successfully');
            return redirect()->route('student.index');
        } catch (\Throwable $th) {
            toastr()->success('can\'t delete student right now');
            return redirect()->route('student.index');
        }
    }


    public function upgradeStudents()
    {

        $grades = Grade::all();

        return view('student.upgrade', compact('grades'));
    }
}
