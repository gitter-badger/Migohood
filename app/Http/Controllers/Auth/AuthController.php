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

    protected $redirectPath = '/explore';

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
            'country' => 'required',
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
            'country' => $data['country'],
            'avatar' => $data['avatar'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /****************
    * Other Services
    *****************/
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */

    public function redirectToProvider()
    {
      return Socialite::driver('facebook')->redirect();
    }

    /**
     *  Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

              /*
        $user = Socialite::driver('facebook')->user();

        $data = [
          'name'=>$user->getName(),
          'email'=>$user->getEmail(),
          'password'=>$user->token,
          'avatar'=>$user->getAvatar(),
          'country'=>'Colombia',
        ];

        $userDB = User::where('email', $user->email)->first();

        if(!is_null($userDB)) {
          Auth::login($userDB);
        }
        else {
          Auth::login($this->create($data));
        }*/

        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/explore');
    }

        /**
      * Return user if exists; create and return if doesn't
      *
      * @param $facebookUser
      * @return User
      */
     private function findOrCreateUser($facebookUser)
     {
         $authUser = User::where('facebook_id', $facebookUser->id)->first();

         if ($authUser){
             return $authUser;
         }

         return User::create([
             'name' => $facebookUser->name,
             'email' => $facebookUser->email,
             'facebook_id' => $facebookUser->id,
             'avatar' => $facebookUser->avatar,
             'country'=>'Colombia'
         ]);
     }
}
