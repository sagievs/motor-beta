<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
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
}
