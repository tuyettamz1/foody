<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    protected function redirectTo()
    {
        $user=Auth::user();

        if($user->role_id == 1){
            return '/admin';
        }else{
            return '/';
        }

    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle()
    {
      return Socialite::driver('google')->redirect();
  }
  
      /**
       * Obtain the user information from GitHub.
       *
       * @return Response
       */
      public function handleGoogleCallback()
      {
        try {


          $googleUser = Socialite::driver('google')->user();

          
          $existUser = User::where('email',$googleUser->email)->first();


          if($existUser) {
              Auth::loginUsingId($existUser->id);
          }
          else {

            $createdUser = User::firstOrCreate([
                'name' => $googleUser->getName(),           
                'email' => $googleUser->getEmail(),
                'password' => md5(rand(1,10000)),
                'role_id' => 2,
                'status' => 1,
            ]);


            Auth::login($createdUser);

            return redirect('/');
        }
        return redirect()->to('/');
    } 
    catch (Exception $e) {
      return 'error';
  }
}


}










