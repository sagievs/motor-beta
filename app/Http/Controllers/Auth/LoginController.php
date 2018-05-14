<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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
    protected $redirectTo = '/login/facebook/callback';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToFbProvider()
    {
        return Socialite::driver('facebook')->asPopup()->redirect();
    }

    public function handleFbProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $name = $user->getName();

        $email = $user->getEmail();

        session()->flash('name', $name);
        session()->flash('email', $email);

        return back();
    }

    public function redirectToVkProvider()
    {
        return redirect()->to('https://oauth.vk.com/authorize?client_id='.env('VK_CLIENT_ID').'&display=popup&redirect_uri=http://povarenok.test/login/vk/callback&scope=email&response_type=code&v=5.71');
    }

    public function handleVkProviderCallback()
    {

        if(request('code'))
        {
            return redirect()->to('https://oauth.vk.com/access_token?client_id='.env('VK_CLIENT_ID').'&client_secret='.env('VK_CLIENT_SECRET').'&redirect_uri=http://povarenok.test/login/vk/callback&code='.request('code'));
        }
    }

}
