<?php

namespace LaravelBoilerplates\Socialite;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LaravelBoilerplates\Socialite\Socialite
 */
class SocialiteFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'socialite';
    }
}
