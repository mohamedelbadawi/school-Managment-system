<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeGradeRequest;
use App\Http\Requests\updateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grade.index', compact('grades'));
    }

    public function storeGrade(storeGradeRequest $request)
    {
        try {

            Grade::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],

                'note' => $request->note

            ]);
            toastr()->success('Grade created successfully!');
            return redirect()->route('grade.index');
        } catch (\Throwable $th) {
            toastr()->error('Can\'t created grade right now');

            return redirect()->route('grade.index');
        }
    }

    public function updateGrade(updateGradeRequest $request, Grade $grade)
    {
        try {

            $grade->update([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'note' => $request->note
            ]);
            toastr()->success('Grade updated successfully!');
            return redirect()->route('grade.index');
        } catch (\Throwable $th) {
            toastr()->error('Can\'t update grade right now');
        }
    }

    public function deleteGrade(Grade $grade)
    {
        try {
            $grade->delete();
            toastr()->success('grade deleted successfully');
            return redirect()->route('grade.index');
        } catch (\Throwable $th) {
            toastr()->error('Can\'t delete grade right now');
            return redirect()->route('grade.index');
        }
    }
}
