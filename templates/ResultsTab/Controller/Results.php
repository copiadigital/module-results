<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Results extends Composer
{

    use PostsTrait;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.builder.results'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'result_years' => $this->resultYears()
        ];
    }

    /**
     * Result years taxonomy
     */
    public function resultYears()
    {
        $years = get_terms([
            'taxonomy' => 'result_years',
            'hide_empty' => false,
            'order' => 'DESC',
        ]);

        return $years;
    }
}
