<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginWithLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function callbackLinkedin()
    {
        $error = !empty(request()->query('error'));
        if ($error) {
            abort(403, request()->query('description'));
        }
        if (!empty(Socialite::driver('linkedin')->stateless()->user()))
        {
            $linkedinuser = Socialite::driver('linkedin')->stateless()->user();
            dd($linkedinuser);
        }

        // return redirect('/profile/');
        // $user = Socialite::driver('linkedin')->user();
        // dd($user);
    }

    //google
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
            try {
            $user = Socialite::driver('google')->user();
            $is_user = User::where('email', $user->getEmail())->first();
            if (!$is_user) {
                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],
                [
                    'name' => $user->user['name'],
                    'email' => $user->getEmail(),
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('product-lapse'. $user->getEmail()),
                    'first_name' => $user->user['given_name'],
                ]);
            }else{
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }
            Auth::loginUsingId($saveUser->id);
            return redirect(route('dashboard'));
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
