<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
# dependencias
# esta depedencia nos permite usar post y get
use Request;
# este facade nos permite responder en json
use Response;
use Auth;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function index()
    {
        return view('auth.login');
    }

    protected function authentication()
    {
        # data para hacer el login
        $email      = request()->input('email');
        $password   = request()->input('password');
        $remember   = request()->input('remember');

        # validamos si los credenciales del usuario son correctos
        if( Auth::attempt(array( 'email' => $email, 'password' => $password ), $remember) ){

            # validamos si el usuario se encuentra con el status de alta
            if( Auth::user()->status_id == 1 ):
                $response['authentication']   = true;
            else:
                $response['authentication']   = 2;
                Auth::logout();
            endif;

        }else{
            $response['authentication']   = false;
        }

        # respondemos con json
        return response()->json($response);

    }

    protected function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

}
