<?php

namespace Results\Providers;
use Copia\CustomPostTypes as CPT;

class RegisterPostType implements Provider
{
    public function __construct()
    {
        add_action('init', [$this, 'cpt_register']);
    }

    public function register()
    {
        //
    }

    public function cpt_register() {
        $types = [];

        array_push($types, CPT::createPostType('results', 'Results', 'Results')
            ->setPublic(true)
            ->setMenuPosition(27)
            ->setMenuIcon('dashicons-list-view')
            ->setSupports(['title', 'revisions'])
            ->setTaxonomies(['result_years'])
            ->setRewrite([
                'slug' => 'results',
                'with_front' => false
            ]),
        );

        array_push($types, CPT::createTaxonomy('result_type', 'results', 'Result Type'));
        array_push($types, CPT::createTaxonomy('result_years', 'results', 'Result Year'));

        CPT::register($types, false);
    }
}
