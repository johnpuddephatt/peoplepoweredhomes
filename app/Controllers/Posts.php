<?php

namespace App\Controllers;

use Sober\Controller\Controller;


class Posts extends Controller
{
    // protected $acf = true;
    public function page() {
        $this->icon = get_field('icon');
        return $this;
    }

    public function posts()
    {
        $posts = get_posts([
            'post_type' => 'post'
        ]);

        // return $posts;

        return array_map(function ($post) {
            $post->url = get_permalink($post->ID);

            $post->excerpt = get_the_excerpt($post->ID);
            $post->thumbnail = get_the_post_thumbnail($post->ID, '4x3', [
                'sizes' => '(min-width: 780px) 320px, 25vw'
            ]);
            return $post;
        }, $posts);

    }
}
