<?php

namespace App\Http\Controllers\Auth;


use Auth;
use App\User;
use Abr4xas\Utils\SeoUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UserRegistered;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\SocialAccount;
use Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;

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
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        notify()->flash('¡Bien!', 'success', [
            'timer' => 5000,
            'text'  => 'Bienvenido, ' . $user->name,
        ]);

       return redirect('/');
    }

}
