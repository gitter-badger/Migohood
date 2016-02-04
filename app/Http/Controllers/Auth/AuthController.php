<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

    protected $redirectPath = '/spaces';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'agree' => 'required',
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
            'avatar' => $data['avatar'],
            'password' => bcrypt($data['password']),
        ]);
    }


     /****************************
              FACEBOOK
     ****************************/
    public function redirectToFacebook()
    {
      return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (ClientException $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/spaces');
    }

    /****************************
             FACEBOOK
    ****************************/
    public function redirectToGoogle()
    {
      return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
        } catch (ClientException $e) {
            return redirect('auth/google');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/spaces');
    }

        /**
      * Return user if exists; create and return if doesn't
      *
      * @param $ProviderUser
      * @return User
      */
     private function findOrCreateUser($ProviderUser)
     {
         $authUser = User::where('email', $ProviderUser->email)->first();

         if ($authUser){
             return $authUser;
         }

         return User::create([
             'name' => $ProviderUser->name,
             'email' => $ProviderUser->email,
             'password'=>$ProviderUser->token,
             'avatar' => $ProviderUser->avatar
         ]);
     }
}
