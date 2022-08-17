<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateParentProfileRequest;
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

    public function showProfile()

    {
        $data = auth('parent')->user();

        return view('parent.profile', compact('data'));
    }


    public function updateProfile(updateParentProfileRequest $request)
    {
        try {
            $parent = auth()->user();
            if ($request->password == null) {
                $parent->update([
                    'father_name' => [
                        'ar' => $request->name_fa_ar,
                        'en' => $request->name_fa_en
                    ],
                    'mom_name' => [
                        'ar' => $request->name_mom_ar,
                        'en' => $request->name_mom_en
                    ],


                ]);
            } else {
                $parent->update([
                    'father_name' => [
                        'ar' => $request->name_fa_ar,
                        'en' => $request->name_fa_en
                    ],
                    'mom_name' => [
                        'ar' => $request->name_mom_ar,
                        'en' => $request->name_mom_en
                    ],
                    'password' => $request->password
                ]);
            }
            return redirect()->back()->with(['success' => 'updated successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
