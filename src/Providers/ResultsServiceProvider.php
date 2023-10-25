<?php

namespace Results\Providers;

use Illuminate\Support\Facades\View;
use Results\View\Composers\Results;

class ResultsServiceProvider implements Provider
{
    protected function providers()
    {
        return [
            CommandServiceProvider::class,
            RegisterPostType::class,
        ];
    }

    public function register()
    {
        foreach ($this->providers() as $service) {
            (new $service)->register();
        }
    }

    public function boot()
    {
        if ( function_exists( '\Roots\view' ) ) {
            \Roots\view()->addNamespace('Results', RESULTS_PLUGIN_DIR . 'resources/views/');

            // \Roots\view('Results::partials.builder.results', ['test' => 'variable'])->render();
        }

        View::composer('Results::partials.builder.results', Results::class);
    }
}
