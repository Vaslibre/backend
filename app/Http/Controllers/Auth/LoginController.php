<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\SocialAccount;
use Auth;
use Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Abr4xas\Utils\SeoUrl;

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
    protected $redirectTo = '/';

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
     * Redirect the user to the {$provider} authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {

        if ($request->has('denied') || $request->has('error')) {

            notify()->flash('¡Oops!', 'error', [
                'timer' => 5000,
                'text'  => 'Has cancelado el inicio de sesión',
            ]);

            return redirect()->route('home');
        }

        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        //  dd($authUser);
        Auth::login($authUser, true);

        notify()->flash('¡Bien!', 'success', [
            'timer' => 5000,
            'text'  => 'Bienvenido, ' . $authUser->name,
        ]);

       return redirect()->intended('home');

    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {

            return $account->user;

        } else {

            $account = new SocialAccount([
                'provider_user_id'  => $providerUser->getId(),
                'provider'          => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email'     => $providerUser->getEmail(),
                    'name'      => $providerUser->getName(),
                    'nickname'  => ($providerUser->getNickname() != NULL ) ? $providerUser->getNickname() : SeoUrl::generateSlug($providerUser->getName()),
                ]);

                $user->assignRole('User');
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
