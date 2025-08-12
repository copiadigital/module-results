<?php

namespace Results\Fields\Partials;

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
        $Fields = new FieldsBuilder('results');

        // $Fields
        //     ->addText('title', [
        //         'label' => 'Title',
        //     ]);

        return $Fields;
    }
}
