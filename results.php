<?php
/**
* Plugin Name:  Results
* Text Domain:  results
* Description:  Results template.
* Version:      1.0.0
* Author:       Copia Digital
* Author URI:   https://www.copiadigital.com/
* License:      MIT License
*/

$autoload_path = __DIR__.'/vendor/autoload.php';
if ( file_exists( $autoload_path ) ) {
    require_once( $autoload_path );
}

define( 'RESULTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

$clover = new Results\Providers\ResultsServiceProvider;
$clover->register();

add_action('init', [$clover, 'boot']);
