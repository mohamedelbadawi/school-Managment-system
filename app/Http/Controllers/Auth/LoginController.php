<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;
    use AuthTrait;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    public function login(Request $request)
    {
        if (Auth::guard($this->checkGuard($request->type))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request->type);
        }
        return redirect()->back();
    }

    public function logout(Request $request)
    {


        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->route('selection');
        }

        if (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
            return redirect()->route('selection');
        }


        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            return redirect()->route('selection');
        }
        if (Auth::guard('parent')->check()) {
            Auth::guard('parent')->logout();
            return redirect()->route('selection');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
