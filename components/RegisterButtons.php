<?php

namespace LaravelBoilerplates\Socialite\Components;

use Illuminate\View\Component;

class RegisterButtons extends Component
{
    public $providers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->providers = ['microsoft', 'facebook'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('socialite::register-buttons');
    }
}
