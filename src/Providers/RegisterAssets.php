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

    public function enqueue() {

        // wp_enqueue_script('results.js', get_template_directory_uri() . '/modules/results/public/scripts/results.js', ['jquery'], null, true);
    }
}