<?php

namespace Results\Fields\Partials;

use StoutLogic\AcfBuilder\FieldsBuilder;
use Results\Providers\ResultsServiceProvider;

class Results
{
    protected $fields;

    public function __construct()
    {
        $parent_layout_key = ResultsServiceProvider::$parent_layout_key;
        $subfield_key = 'results';
        $final_key = $parent_layout_key . '_' . $subfield_key;

        $this->fields = new FieldsBuilder($final_key);

        // $this->fields
        //     ->addText('title', [
        //         'label' => 'Title',
        //         'required' => 0,
        //         'maxlength' => false,
        //         '_name' => 'title',
        //     ]);
    }

    /**
     * Get the built fields for the partial
     *
     * @return array
     */
    public function register(): array
    {
        return $this->fields->build();
    }
}
