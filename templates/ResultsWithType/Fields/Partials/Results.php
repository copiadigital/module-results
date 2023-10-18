<?php

namespace App\Fields\Partials\Builder\Layouts;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Results extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $Results = new FieldsBuilder('results');

        $Results
            ->addText('title', [
                'label' => 'title',
                'instructions' => 'Please enter a title to appear above the results.',
            ]);
        return $Results;
    }
}
