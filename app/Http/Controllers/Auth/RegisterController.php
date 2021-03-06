<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Notifications\RegisteredUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail; 
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

     /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
     public function showRegistrationForm()
     {
        $title = 'S \'inscrire';
        $data = [
            'title'=>$title
        ];
        return view('auth.register')->with($data);
     }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/backend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function confirm($id, $token)
    {
       $user =  User::where('id',$id)->where('confirmation_token',$token)->first();
       if($user){
           $user->update(['confirmation_token'=>null]);
           $this->guard()->login($user);
           return redirect($this->redirectPath())->with('success','Votre cmpte a bien été activé');
       }else{
           return redirect('/login')->with('error','ce lien ne semble plus valide');
       }
       
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        
        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUser());
        //Mail::to('carlos.nguetta@gmail.com')->send(new RegisterMail($user));
        return redirect('/login')->with('success','votre compte a bien été crée confirmer le compte avec le lien d\'activation qui vous a été envoyé a votre adresse email');
        
        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required'],
            'phone'=>['required']
        ]);
    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=>$data['role'],
            'phone'=>$data['phone'],
            'confirmation_token'=>str_replace('/', '', Hash::make(str_random(16)))
        ]);
    }


   
}
