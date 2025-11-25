<?php

namespace Results\Callbacks;

class Admin
{
    private static $singleton;

    /**
     * Singleton pattern prevents accidental creation of multiple wp hook callbacks
     * @return void
     */
    public static function register(): void
    {
        if ( !self::$singleton ) {
            self::$singleton = new self;
        }
    }

    public function __construct()
    {
        add_action('admin_menu', [$this, 'remove_taxonomies_metaboxes']);
    }

    public function remove_taxonomies_metaboxes()
    {
        remove_meta_box( 'tagsdiv-result_years', 'results', 'side' );
    }
}
