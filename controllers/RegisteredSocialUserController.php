<?php

namespace LaravelBoilerplates\Socialite\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class RegisteredSocialUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('socialite::register');
    }
    /**
     * Redirect to the providers authentication site.
     *
     * @return \Illuminate\View\View
     */
    public function create($provider)
    {
        config(["services.$provider.redirect" => "https://portal.graboyes.test/register/$provider/callback" ]);

        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('There was an error trying to register with that provider.');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store($provider)
    {
        try {
            config(["services.$provider.redirect" => "https://portal.graboyes.test/register/$provider/callback" ]);
            $socialite = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            dd($e);
        }

        config(["services.$provider.redirect" => "https://portal.graboyes.test/register/$provider/callback" ]);
        $socialite = Socialite::driver($provider)->user();

        $userClassName = config("auth.providers.users.model");

        $user = (new $userClassName)->whereEmail($socialite->email)->first();

        if($user) {
            // Already Registered.

        } else {

            $user = $userClassName::create([
                'name' => $socialite->name,
                'email' => $socialite->email,
                'password' => Hash::make($socialite->token),
                'provider' => $provider
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect()->intended();
        }

    }
}
