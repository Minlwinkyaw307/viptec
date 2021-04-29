<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    /**
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $socialite = Socialite::driver('facebook')->user();

        $user = User::where('email', $socialite->getEmail())->first();

        if($user)
        {
            $user = User::create([
                'name' => $socialite->getName(),
                'email' => $socialite->getEmail(),
                'password' => \Hash::make(Str::random(10)),
                'email_verified_at' => now(),
            ]);
        }
        dd($user);
    }
}
