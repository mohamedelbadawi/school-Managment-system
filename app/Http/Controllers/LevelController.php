<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Requests\storeLevelRequest;
use App\Http\Requests\updateLevelRequest;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::with(['grade'])->get();
        $grades = Grade::all();

        return view('level.index', compact('levels', 'grades'));
    }

    public function storelevel(storeLevelRequest $request)
    {



        try {
            foreach ($request->levels as $level) {

                Level::create([
                    'name' => [
                        'ar' => $level['name_ar'],
                        'en' => $level['name_en']
                    ],
                    'grade_id' => $level['grade_id']
                ]);
            }
            toastr()->success('level created successfully!');
            return redirect()->route('level.index');
        } catch (\Throwable $th) {
            toastr()->error('cannot created level right now ');
            return redirect()->route('level.index');
        }
    }

    public function updateLevel(updateLevelRequest $request, Level $level)
    {
        try {
            $level->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'grade_id' => $request->grade_id
            ]);
            toastr()->success('level updated successfully!');
            return redirect()->route('level.index');
        } catch (\Throwable $th) {
            toastr()->error('cannot update level right now ');
            return redirect()->route('level.index');
        }
    }

    public function deleteLevel(Level $level)
    {
        try {
            $level->delete();
            toastr()->success('level deleted successfully!');
            return redirect()->route('level.index');
        } catch (\Throwable $th) {
            toastr()->error('cannot deleted level right now ');
            return redirect()->route('level.index');
        }
    }


    public function deleteAll(Request $request)
    {
        // dd($request);
        $ids = explode(',', $request->ids);

        foreach ($ids as $id) {
            $level = Level::findOrFail($id);
            $level->delete();
        }
        toastr()->success('level deleted successfully!');
        return redirect()->route('level.index');
    }
}
