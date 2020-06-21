<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request,  $user)
    {
        if(!$user->status)
        {
            $this->guard()->logout();

            $request->session()->invalidate();

            return redirect('/login');
        }

        if($user->last_login == null)
        {
            $user->last_login = Carbon::now();
            $user->save();

            return redirect('/admin/update-password');
        }

        $user->last_login = Carbon::now();
        $user->save();

    }
}
