<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

        public function showLoginForm()
        {
            $title = 'Se Connecter';
            $data = [
                'title'=>$title
            ];
            return view('auth.login')->with($data);
        }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend';


    /**
     * force l'utilisateur a se connecter que par username a défaut d'utiliser son email pour se logger
     *
     * @return void
     */
    // public function username()
    // {
    //     return 'username';
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return array_merge(
                $request->only($this->username(), 'password'),
                ['confirmation_token'=>null]
        );
    }

   
}
