<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>


<?php

       $query = new WP_Query( $args );

        if ( $query->have_posts() ) {

            while ( $query->have_posts() ) {

                $query->the_post();

                echo $query->post->ID;
                // now $query->post is WP_Post Object, use:
                // $query->post->ID, $query->post->post_title, etc.

            }

        }

?>