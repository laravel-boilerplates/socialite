<?php

namespace LaravelBoilerplates\Socialite\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialSessionController extends Controller
{
    /**
     * Redirect to the providers authentication site.
     *
     * @return \Illuminate\View\View
     */
    public function create($provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('There was an error with that provider.');
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($provider)
    {
        $socialite = Socialite::driver($provider)->user();

        session(['token' => $socialite->token]);

        $userClassName = config("auth.providers.users.model");

        $user = (new $userClassName)->whereEmail($socialite->email)->first();

        if(!$user) {
            $user = $userClassName::create([
                'name' => $socialite->name,
                'email' => $socialite->email,
                'password' => Hash::make($socialite->token),
            ]);

            dd($socialite, $user);
            // return redirect()->route('register')->withErrors('Please register with that provider first.');
        }

        Auth::login($user);
        return redirect()->intended();
    }
}
