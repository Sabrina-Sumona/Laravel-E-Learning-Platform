<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Notification;
use App\Notifications\AlertNotification;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('checkuser')->only('register');
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function register(Request $request){
      $userInfo= array();

      if($request->get('password')===$request->get('rpassword')) {
        $userInfo['name']=$request->has('name')? $request->get('name'):'';
        $userInfo['uname']=$request->has('uname')? $request->get('uname'):'';
        $userInfo['roll']=$request->has('roll')? $request->get('roll'):'';
        $userInfo['mobile']=$request->has('mobile')? $request->get('mobile'):'';
        $userInfo['email']=$request->has('email')? $request->get('email'):'';
        $userInfo['password']=$request->has('password')? bcrypt($request->get('password')):'';
        $userInfo['role']=$request->has('role')? $request->input('role'):'';
        $userInfo['remember']=$request->has('yes')? $request->get('yes'):'';

        $user= User::create($userInfo);

        Auth::loginUsingId($user->id);

        $user = User::latest('id')->first();
        Notification::send($user, new AlertNotification($user));

        return redirect()->route('courses.index');
      } else {
        return back()->with('failure', 'Password confirmation failed!!');
      }
    }
}
