<?php

namespace Results\Fields\Partials;

use Log1x\AcfComposer\Partial;
use Log1x\AcfComposer\Builder;

class Results extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $Fields = Builder::make('results');

        // $Fields
        //     ->addText('title', [
        //         'label' => 'Title',
        //     ]);

        return $Fields;
    }
}
