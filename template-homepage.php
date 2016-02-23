<?php
/**
 * Template Name: Template Homepage
 */

get_header();

if( have_posts() ):
    // Start the Loop.
    while( have_posts() ): the_post();

        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'tz-plazarttheme' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );

    endwhile;
endif;

get_footer();
?>