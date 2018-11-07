<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }






    protected  $check = 0;


    /**GOOGLE**/
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider_all($service)
    {
        //$this->check = $loginid;
        return Socialite::driver($service)->redirect();
    }
    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback_all($service)
    {


        $user = Socialite::driver($service)->stateless()->user();

        $access_token = $user->token;
        $name = $user->name;
        $email = $user->email;
        $pass = $user->id;

        if($this->isRegistered($email)){

            $user_array = array();
            $user_array['email'] = $email;
            $user_array['password'] = $pass;

            /*For Login */
            if(Auth::attempt($user_array)){

                return Redirect::to('/home');
            }else{
                echo "pass incorrect";
            }
        }else{
            return User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($pass),
            ]);
        }

    }

    public function isRegistered($mail){

        $user = User::where('email', $mail)->first();
        if ($user) {
            Session::put('user_id',$user->id);
            return true;
        } else {
            return false;
        }

    }


    public function isLoginButtonClicked($check){
        if($check==1){
            return true;
        }else{
            return false;
        }

    }




}
