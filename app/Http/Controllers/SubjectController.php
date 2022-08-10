<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSubjectRequest;
use App\Http\Requests\updateSubjectRequest;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class SubjectController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $teachers = Teacher::with(['specialization'])->get();
        $subjects = Subject::with(['grade',  'level', 'teacher'])->get();

        return view('subject.index', compact('subjects', 'grades', 'teachers'));
    }

    public function store(storeSubjectRequest $request)
    {
        try {
            Subject::create([
                'name' => $request->name,
                'grade_id' => $request->grade_id,
                'level_id' => $request->level_id,
                'teacher_id' => $request->teacher_id
            ]);
            toastr()->success('subject created successfully');
        } catch (\Throwable $th) {
            toastr()->error('something error !');
        }
        return redirect()->route('subject.index');
    }
    public function update(updateSubjectRequest $request, Subject $subject)
    {
        try {
            $subject->update([
                'name' => $request->name,
                'grade_id' => $request->grade_id,
                'level_id' => $request->level_id,
                'teacher_id' => $request->teacher_id
            ]);
            toastr()->success('subject updated successfully');
        } catch (\Throwable $th) {
            toastr()->error('something error !');
        }
        return redirect()->route('subject.index');
    }
    public function delete(Subject $subject)
    {
        try {
            $subject->delete();
            toastr()->success('subject deleted successfully');
        } catch (\Throwable $th) {
            toastr()->error('something error !');
        }
        return redirect()->route('subject.index');
    }
}
