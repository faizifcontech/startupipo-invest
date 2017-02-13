<?php

namespace App\Http\Controllers\Auth;

use App\Agent;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return redirect('/login');
    }

    public function showRegistrationFormAgent($agent_name)
    {
        $cariName = Agent::where('ref_agent_name', $agent_name)->first();
        if ($cariName == null){
            session()->flash('error',  'Sorry, Your agent not found');
            return redirect('/login');
        }
        $data["getAgent"] = $cariName->ref_agent_name ;
        //dd($cariName);
         return view('auth.register', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'gender' => 'required',
            'password' => 'required|min:6|confirmed',
            'digital_signature' => 'required',
            // 'g-recaptcha-response' => 'required|captcha', // reCaptcha google
            'terms' => 'accepted' // This is check checkbox is checked
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 7; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $generateRef = "REF{$randomString}";


        return User::create([
            'name' => ucwords($data['name']),
            'email' => $data['email'],
            'gender' => $data['gender'],
            'signature' => $data['digital_signature'],
            'agent_referral' => $data['ref_agent'],
            'invite_id' => $data['invite_id'],
            'invite_code' => $generateRef,
            'password' => bcrypt($data['password']),
        ]);
    }
}
