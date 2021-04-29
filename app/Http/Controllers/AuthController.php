<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('front.login');
    }

    /**
     * Attempt To Login Using given Information
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function post_login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'),], $request->get('remember') ?? false)) {

            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withErrors('Login Failed! Please Try Again');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect(localized_route('front.login'));
    }

    /**
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(): \Illuminate\Http\RedirectResponse
    {
        $socialite = Socialite::driver('facebook')->user();

        $user = User::where('email', $socialite->getEmail())->first();

        if(!$user)
        {
            $user = User::create([
                'name' => $socialite->getName(),
                'email' => $socialite->getEmail(),
                'password' => \Hash::make(Str::random(10)),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        return redirect()->route('admin.index');
    }
}
