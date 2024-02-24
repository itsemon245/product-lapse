<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{
    public function loginWithLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function callbackLinkedin()
    {
        $user = Socialite::driver('linkedin')->user();
    }

    //google
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        $user = Socialite::driver('google')->user();
    }
}
