<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Page extends Controller
{
    // protected $acf = true;

    public function page()
    {
        $this->icon = get_field('icon');
        $this->title = get_the_title();
        $this->thumbnail = get_the_post_thumbnail(null, '16x9', [
            'sizes' => '(min-width: 780px) 780px, 90vw'
        ]);
        $this->section = get_the_terms(null, 'section') ? get_the_terms(null, 'section')[0] : '';;
        if(has_excerpt()) { // only get manually set excerpts
            $this->excerpt = get_the_excerpt();
        }
        $this->content = apply_filters("the_content", get_the_content());
        return $this;
    }

    public function pages()
    {

        $pages = get_posts([
            'post_type' => 'page',
            'numberposts' => '-1',
            'exclude' => get_the_ID(),
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'section',
                    'field' => 'slug',
                    'terms' => $this->page()->section->slug,

                )
            )
        ]);

        return array_map(function ($page) {
            $page->excerpt = get_the_excerpt($page->ID);
            $page->thumbnail = get_the_post_thumbnail($page->ID, '4x3', [
                'sizes' => '(min-width: 780px) 320px, 25vw'
            ]);
            $page->link = get_the_permalink($page->ID);
            return $page;
        }, $pages);

    }
}
