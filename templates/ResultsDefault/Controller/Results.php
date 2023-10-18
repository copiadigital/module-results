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
        $catYears = get_categories([
            'taxonomy' => 'result_years',
            'hide_empty' => true,
        ]);

        $yearsIds = [];
        if($catYears) {
            foreach($catYears as $tid) {
                $yearsIds[] = $tid->term_id;
            }
        }

        $itemList = [];

        if($yearsIds) {
            foreach($yearsIds as $key => $id) {
                $term = get_term_by( 'id', $id, 'result_years' );
                $itemList[$key]['years']['name'] = $term->name;
                $itemList[$key]['years']['slug'] = $term->slug;

                $args = [
                    'post_type' => 'results',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => [
                        array(
                            'taxonomy' => 'result_years',
                            'field' => 'id',
                            'terms' => $id,
                        ),
                    ],
                    'meta_key' => 'date',
                    'order' => 'DESC',
                    'orderby' => 'meta_value',
                ];

                $itemList[$key]['results'] = [];

                $query = new WP_Query($args);

                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        $fields['title'] = get_the_title();
                        $fields['date'] = get_field('date');
                        $fields['press_release'] = get_field('press_release');
                        $fields['presentation'] = get_field('presentation');
                        $fields['report'] = get_field('report');
                        $itemList[$key]['results'][] = $fields;
                    }
                    wp_reset_postdata();
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
