<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\NoCodeCoverageDriverWithPathCoverageSupportAvailableException;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $setting = $settings->flatMap(function ($settings) {
            return [$settings->key => $settings->value];
        });
        // dd($setting);
        return view('setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }


            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/images'), $filename);
                Setting::where('key', 'logo')->update(['value' => $filename]);
            }

            toastr()->success('updated successfully');
            return back();
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
