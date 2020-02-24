<?php

namespace App\Http\Controllers\Auth;

use App\Traits\CaptchaTrait;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\ActivationTrait;
use App\Models\User;
use App\Models\Role;
use App\Models\UserPaymentType;


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

    use RegistersUsers, ActivationTrait, CaptchaTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
   // protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

      //  $data['captcha'] = $this->captchaCheck();
                //'g-recaptcha-response'  => 'required',
               // 'captcha'               => 'required|min:1'
			   // 'g-recaptcha-response.required' => 'Captcha is required',
              //  'captcha.min'           => 'Wrong captcha, please try again.'
        $validator = Validator::make($data,
            [
                'hotel_name'            => 'required',
                'first_name'            => 'required',
                'last_name'             => 'required',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:6|max:20',
                'password_confirmation' => 'required|same:password',
                'phone'              => 'required|min:10|max:15',
                'website'              => 'required',
               
            ],
            [
                'hotel_name.required'   => 'Hotel Name is required',
                'first_name.required'   => 'First Name is required',
                'last_name.required'    => 'Last Name is required',
                'email.required'        => 'Email is required',
                'email.email'           => 'Email is invalid',
                'password.required'     => 'Password is required',
                'password.min'          => 'Password needs to have at least 6 characters',
                'password.max'          => 'Password maximum length is 20 characters',
                'phone.required'     => 'Phone is required',
                'phone.min'          => 'Phone needs to have at least 10 characters',
                'phone.max'          => 'Phone maximum length is 15 characters',
                'website.required'     => 'Web site is required',
               
            ]
        );

        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user =  User::create([
            'hotel_name' => $data['first_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'website' => $data['website'],
            'comments' => $data['comments'],
            'token' => str_random(64),
            'activated' => !config('settings.activation')
        ]);
        $role = Role::whereName('merchant')->first();
        $user->assignRole($role);

        $this->initiateEmailActivation($user);
         $this->redirectTo = '/merchant';
        return $user;

    }

}