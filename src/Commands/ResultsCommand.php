<?php

namespace Results\Commands;

class ResultsCommand extends \WP_CLI_Command
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * command usage: wp results results_tab
     */
    public function results_tab()
    {
        $views_plugin_dir = RESULTS_PLUGIN_DIR . 'templates/ResultsTab/Views/results.blade.php';
        $views_theme_dir = get_stylesheet_directory() . '/resources/views/partials/builder/results.blade.php';

        $controller_plugin_dir = RESULTS_PLUGIN_DIR . 'templates/ResultsTab/Controller/Results.php';
        $controller_theme_dir = get_stylesheet_directory() . '/app/View/Composers/Results.php';

        $field_plugin_dir = RESULTS_PLUGIN_DIR . 'templates/ResultsTab/Fields/Results.php';
        $field_theme_dir = get_stylesheet_directory() . '/app/Fields/Results.php';

        $field_partial_plugin_dir = RESULTS_PLUGIN_DIR . 'templates/ResultsTab/Fields/Partials/Results.php';
        $field_partial_theme_dir = get_stylesheet_directory() . '/app/Fields/Partials/Builder/Layouts/Results.php';

        if(!copy($views_plugin_dir, $views_theme_dir)) {
            echo "\nfailed to copy $views_plugin_dir to $views_theme_dir...\n";
        }else {
            echo "\nSuccessfully copy $views_plugin_dir to $views_theme_dir...\n";
        }

        if(!copy($controller_plugin_dir, $controller_theme_dir)) {
            echo "\nfailed to copy $controller_plugin_dir to $controller_theme_dir...\n";
        }else {
            echo "\nSuccessfully copy $controller_plugin_dir to $controller_theme_dir...\n";
        }

        if(!copy($field_plugin_dir, $field_theme_dir)) {
            echo "\nfailed to copy $field_plugin_dir to $field_theme_dir...\n";
        }else {
            echo "\nSuccessfully copy $field_plugin_dir to $field_theme_dir...\n";
        }

        if(!copy($field_partial_plugin_dir, $field_partial_theme_dir)) {
            echo "\nfailed to copy $field_partial_plugin_dir to $field_partial_theme_dir...\n";
        }else {
            echo "\nSuccessfully copy $field_partial_plugin_dir to $field_partial_theme_dir...\n";
        }
    }
}
