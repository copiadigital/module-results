<?php

namespace Results\Providers;

use Results\View\Composers\App;

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

    }
}
