<?php

namespace Results\Providers;

class RegisterAssets implements Provider
{
    public function __construct()
    {
        add_action('init', [$this, 'enqueue']);
    }

    public function register()
    {
        //
    }

    public function enqueue()
    {
        // wp_enqueue_script('results', asset('scripts/modules/results.js')->uri(), ['vendor', 'jquery'], null, true);
    }
}