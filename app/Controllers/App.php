<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_queried_object()->name;
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function primary_navigation() {

        $sections = get_terms([
            'taxonomy' => 'section',
        ]);

        foreach($sections as $section) {
            $section->pages = get_posts([
                'post_type' => 'page',
                'order' => 'ASC',
                'posts_per_page'=> -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'section',
                        'field' => 'slug',
                        'terms' => $section->slug
                    )
                )
            ]);

            foreach($section->pages as $page) {
                $page->url = get_permalink($page->ID);
            }
        }

        return $sections;
    }

    public function footer_navigation() {
        $args = array(
            'theme_location'    => 'footer_navigation',
            'walker'            => new \App\wp_bulma_navwalker(),
            'container'         => false,
            'menu_class'        => 'footer-menu',
        );
        return $args;
    }

    public function secondary_navigation() {
        $args = array(
            'theme_location'    => 'secondary_navigation',
            'walker'            => new \App\wp_bulma_navwalker(),
            'container'         => false,
            'menu_class'        => 'navbar-menu navbar-end',
        );
        return $args;
    }

}
