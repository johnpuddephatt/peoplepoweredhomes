<?php

namespace App\Controllers;

use Sober\Controller\Controller;


class taxonomySection extends Controller
{
    // protected $acf = true;

    public function page() {
        $this->icon = get_field('icon', 'section_' . get_queried_object()->term_id);
        $this->description = term_description();
        return $this;
    }

    public function pages()
    {

        $pages = get_posts([
            'post_type' => 'page',
            'posts_per_page' => '12',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'section',
                    'field'    => 'slug',
                    'terms'    => get_queried_object()->slug
                )
            )
        ]);

        return array_map(function ($page) {
            $page->excerpt = get_the_excerpt($page->ID);
            $page->thumbnail = get_the_post_thumbnail($page->ID, '4x3', [
                'sizes' => '(min-width: 780px) 320px, 25vw'
            ]);
            $page->link = get_the_permalink($page->ID);
            $loop_index++;
            return $page;
        }, $pages);
    }
}
