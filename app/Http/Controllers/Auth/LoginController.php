<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Models\Hotelcorporatecontactbasic;
use Auth;
use Session;
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
     * Auth guard
     *
     * @var
     */
    protected $auth;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * LoginController constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        $email      = $request->get('email');
        $password   = $request->get('password');
        $remember   = $request->get('remember');

        if ($this->auth->attempt([
            'email'     => $email,
            'password'  => $password
        ], $remember == 1 ? true : false)) {

            
            
            //General User Check
            // if ( $this->auth->user()->hasRole('user')) {

            //     return redirect()->route('user.home');

            // }
            //Merchant User Check
            //  if ( $this->auth->user()->hasRole('merchant')) {
            //     return redirect()->route('merchant.home');
            // }
            //dd($this->auth->user()->hasRole('crm'));
            //CRM User Check
             // if ( $this->auth->user()->hasRole('crm')) {                    
                    
    //                  return redirect()->route('crm.outlook-auth'); 
    //             }
             if ($this->auth->user()->hasRole('crm')) { 

                    if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                    }
                    $_SESSION['oauth_state']='';

                    return redirect()->route('crm.home');      
                }
            //Admin User Check
            if ( $this->auth->user()->hasRole('administrator')) {

                return redirect()->route('admin.home');

            }

        }
        else {

            return redirect()->back()
                ->with('message','Incorrect email or password')
                ->with('status', 'danger')
                ->withInput();
        }

    }

public function logout(Request $request) {
    Auth::logout();   
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    session_destroy();
    unset($_SESSION['oauth_state']);
    session_unset();
    Session::flush();
    return redirect('/login');
}

}