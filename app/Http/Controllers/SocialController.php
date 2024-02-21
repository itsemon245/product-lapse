<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{
    public function provider()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function providerCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        dd($user);
    }
}
