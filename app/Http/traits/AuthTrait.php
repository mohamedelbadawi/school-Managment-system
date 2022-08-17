<?php

namespace App\Http\traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{

    public function checkGuard($type)
    {

        if ($type == 'student') {
            $guradName = 'student';
        }
         else if ($type == 'parent') {
            $guradName = 'parent';
        }
         else if ($type == 'teacher') {
            $guradName = 'teacher';
        } else {
            $guradName = 'web';
        }
        return $guradName;
    }

    public function redirect($type)
    {

        if ($type == 'student') {
            return redirect()->intended(RouteServiceProvider::STUDENT);
        } elseif ($type == 'parent') {
            return redirect()->intended(RouteServiceProvider::PARENT);
        } elseif ($type == 'teacher') {
            return redirect()->intended(RouteServiceProvider::TEACHER);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
