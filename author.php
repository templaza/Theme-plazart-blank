<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<section class="container home-post">
    <div class="row">
        <div class="col-md-9">
            <h1 class="tzarchive"><?php echo  esc_html(get_search_query()); ?></h1>
            <?php
            if ( have_posts() ) : while (have_posts()) : the_post() ;
                $tz_plazarttheme_post_type = get_post_type( $post -> ID );
                ?>
                <article id='post-<?php the_ID(); ?>' class="post-item">
                    <?php the_post_thumbnail(); ?>
                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    <?php if ( get_the_tags () !=  false || get_the_terms( $post -> ID, 'portfolio-tags' ) != false ): ?>
                    <div class="tztag">
                        TAG:
                        <?php
                        if ( $tz_plazarttheme_post_type == 'post' ):
                            the_tags( '',',','' ) ;
                        else:
                            the_terms( $post -> ID, 'portfolio-tags','',',' ) ;
                        endif;
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="tzcat">
                        CATEGORY :
                        <?php
                        if ( $tz_plazarttheme_post_type == 'post' ):
                            the_category(',',',','' ) ;
                        else:
                            the_terms( $post -> ID, 'portfolio-category','',',' ) ;
                        endif;
                        ?>

                    </div>
                    <div class="description">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile; // end while ( have_posts )
            endif; // end if ( have_posts )
            ?>
            <?php tz_plazarttheme_paging_nav(); ?>
        </div>
        <div class="col-md-3 tzsidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>

