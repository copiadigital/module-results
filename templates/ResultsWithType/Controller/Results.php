<?php
namespace App\View\Composers;
use Roots\Acorn\View\Composer;
use WP_Query;

class Results extends Composer
{
    use PostsTrait;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.builder.results',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'results' => $this->getResearchByTaxonomy(),
        ];
    }

    /**
     * Manipulation of data
     *
     * @return array
     */
    private function getResearchByTaxonomy()
    {
        $catTypes = get_categories([
            'taxonomy' => 'result_type',
            'hide_empty' => true,
        ]);

        $catYears = get_categories([
            'taxonomy' => 'result_years',
            'hide_empty' => true,
        ]);

        $typesIds = [];
        if($catTypes) {
            foreach($catTypes as $tid) {
                $typesIds[] = $tid->term_id;
            }
        }

        $yearsIds = [];
        if($catYears) {
            foreach($catYears as $tid) {
                $yearsIds[] = $tid->term_id;
            }
        }

        $itemList = [];

        if($typesIds) {
            foreach($typesIds as $key => $id) {
                $term = get_term_by( 'id', $id, 'result_type' );
                $itemList[$key]['type']['name'] = $term->name;
                $itemList[$key]['type']['slug'] = $term->slug;
                if($yearsIds) {

                    foreach($yearsIds as $yKey => $yid) {
                        wp_reset_query();

                        $term = get_term_by( 'id', $yid, 'result_years' );

                        $args = [
                            'post_type' => 'results',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'tax_query' => [
                                array(
                                    'taxonomy' => 'result_years',
                                    'field' => 'id',
                                    'terms' => $yid,
                                ),
                                array(
                                    'taxonomy' => 'result_type',
                                    'field' => 'id',
                                    'terms' => $id,
                                ),
                            ],
                            'meta_key' => 'date',
                            'order' => 'DESC',
                            'orderby' => 'meta_value',
                        ];

                        $itemList[$key]['yearlist'][$yKey]['years']['name'] = $term->name;
                        $itemList[$key]['yearlist'][$yKey]['years']['slug'] = $term->slug;

                        $itemList[$key]['yearlist'][$yKey]['results'] = [];

                        $query = new WP_Query($args);

                        if($query->have_posts()) {
                            while($query->have_posts()) {
                                $query->the_post();
                                $fields['title'] = get_the_title();
                                $fields['date'] = get_field('date');
                                $fields['press_release'] = get_field('press_release');
                                $fields['presentation'] = get_field('presentation');
                                $fields['report'] = get_field('report');
                                $itemList[$key]['yearlist'][$yKey]['results'][] = $fields;
                            }
                        }

                        if(!$itemList[$key]['yearlist'][$yKey]['results']) {
                            unset($itemList[$key]['yearlist'][$yKey]);
                        }
                    }
                }
            }
        }

        return $itemList;
    }

    /**
     * Allows you to get variables that would already be present in the partial
     * @todo-wp_template Migrate this method to a parent class
     * @param $key
     * @return mixed
     */
    public function getPartialData($key)
    {
        return $this->view->getData()[$key];
    }
}
