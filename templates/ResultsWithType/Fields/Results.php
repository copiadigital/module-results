<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Results extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        if(!is_plugin_active('results/results.php')) {
            return;
        }

        $Results = new FieldsBuilder('results', [
            'title' => 'Fields',
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
            'show_in_rest' => 0,
        ]);

        $Results
            ->setLocation('post_type', '==', 'results');

        $Results
            ->addTaxonomy('year', [
                'label' => 'Year',
                'taxonomy' => 'result_years',
                'add_term' => 0,
                'save_terms' => 1,
                'load_terms' => 1,
                'return_format' => 'object',
                'field_type' => 'select',
            ])
            ->addDatePicker('date', [
                'label' => 'Date',
                'required' => 1,
                'display_format' => 'd/m/Y',
                'return_format' => 'j M Y',
                'first_day' => 1,
            ])
            ->addFile('press_release', [
                'label' => 'Press Release',
                'instructions' => 'Please upload or select a press release that is in the format of PDF.',
                'wrapper' => array(
                    'width' => '50',
                ),
                'mime_types' => 'pdf',
            ])
            ->addFile('report', [
                'label' => 'Report',
                'instructions' => 'Please upload or select a report that is in the format of PDF.',
                'mime_types' => 'pdf',
            ])
            ->addFile('presentation', [
                'label' => 'Presentation',
                'instructions' => 'Please upload or select a presentation that is in the format of PDF.',
                'mime_types' => 'pdf',
            ]);

        return $Results->build();
    }
}
