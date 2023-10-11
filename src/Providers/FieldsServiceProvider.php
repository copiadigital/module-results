<?php

namespace Results\Providers;

use Results\Fields\Results;

class FieldsServiceProvider implements Provider
{
    public function __construct()
    {
        // new Results();
        // add_action('template_include', [$this, 'change_template']);
    }

    public function register()
    {
        // return Results\Fields\Results::class;
        // new Results();
    }

    public function change_template($template)
    {
        $new_template = RESULTS_PLUGIN_DIR.'resources/views/partials/builder/results.blade.php';
        return $new_template;

        return $template;
    }
}
