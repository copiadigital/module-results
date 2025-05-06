<?php

namespace Results\Providers;

use Illuminate\Support\Facades\View;
use Results\Fields\Results as ResultsField;
use Results\Fields\Partials\Results as ResultsBuilderField;
use Results\View\Composers\Results as ResultsComposer;
use Log1x\AcfComposer\AcfComposer;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Clones\Builder;

class ResultsServiceProvider implements Provider
{
    public static $parent_layout_key;

    protected function providers()
    {
        return [
            RegisterAssets::class,
            RegisterPostType::class,
        ];
    }

    public function register()
    {
        $results_key = 'results';  // Variable value
        self::$parent_layout_key = 'builder_builder_' . $results_key;

        foreach ($this->providers() as $service) {
            (new $service)->register();
        }
    }

    public function boot()
    {
        // Register Fields
        $composer = app(AcfComposer::class);
        $results = new ResultsField($composer);
        $results->compose();

        add_filter('acf/load_field/name=builder', function ($field) {
            if (isset($field['layouts'])) {
                $results_builder = new ResultsBuilderField();

                $layout = [
                    'key' => 'field_'.self::$parent_layout_key,
                    'name' => 'results',
                    'label' => 'Results',
                    'display' => 'block',
                    'sub_fields' => $results_builder->register()['fields'],
                    'min' => '',
                    'max' => '',
                    'acfe_flexible_render_template' => false,
                    'acfe_flexible_render_style' => false,
                    'acfe_flexible_render_script' => false,
                    'acfe_flexible_thumbnail' => false,
                    'acfe_flexible_settings' => false,
                    'acfe_flexible_settings_size' => 'medium',
                    'acfe_flexible_modal_edit_size' => false,
                    'acfe_flexible_category' => false,
                ];

                $field['layouts'][] = $layout;
            }
            // dd($field);
            return $field;
        });

        // Register views
        if ( function_exists( '\Roots\view' ) ) {
            \Roots\view()->addNamespace('Results', dirname(dirname(__DIR__)) . '/resources/views/');

            // \Roots\view('Results::partials.builder.results', ['test' => 'variable'])->render();
        }

        View::composer('Results::partials.builder.results', ResultsComposer::class);

    }
}
