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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/stock';   // '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    // laravel add user active filed for authentification
    // https://laracasts.com/discuss/channels/laravel/adding-a-condition-to-authentication-53?page=1
    // https://stackoverflow.com/questions/16750375/check-for-active-user-state-with-laravel

    /*
     * Type error: Argument 1 passed to App\Http\Controllers\Auth\LoginController::credentials()
     * must be an instance of
     * App\Http\Controllers\Auth\Request,
     * instance of
     * Illuminate\Http\Request
     * given, called in F:\icademia\Controles_continus\FINAL\laravel\vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php on line 79
     *
     *
     * App\Http\Controllers\Auth\LoginController::credentials() must be an instance of
     * App\Http\Controllers\Auth\Request, instance of
     * Illuminate\Http\Request given
     *
     * App\Http\Controllers\Auth\LoginController::credentials() must be an instance of
     * App\Http\Controllers\Auth\Illuminate\Http\Request, instance of
     * Illuminate\Http\Request given,
     *
     */

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
//     protected function credentials(Request $request)    // + use Illuminate\Http\Request;
//     {
// //         return $request->only($this->username(), 'password');
//         return array_merge($request->only($this->username(), 'password'), ['active' => 1]);
//     }



    // authentification name instead mail
    // https://www.grafikart.fr/forum/topics/23223
    // https://www.5balloons.info/customizating-laravel-authentication-to-login-via-username-instead-of-email/
    // http://paulcracknell.com/101/laravel-5-login-username-instead-email/
    /**
     * Override the username method used to validate login
     *
     * @return string
     */
    public function username()
    {
        return 'name';
    }


}
