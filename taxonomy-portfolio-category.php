<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<section class="container home-post">
    <div class="row">
        <div class="col-md-9">
            <h1><?php  single_cat_title(); ?></h1>
            <?php
            if ( have_posts() ) : while (have_posts()) : the_post() ;
                ?>
                <article id='post-<?php the_ID(); ?>' class="post-item">
                    <?php the_post_thumbnail(); ?>
                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    <?php if ( get_the_terms( $post->ID, 'portfolio-tags' ) !=  false ): ?>
                        <div class="tztag">
                            TAG: <?php the_terms( $post -> ID, 'portfolio-tags','',',' ) ; ?>
                        </div>
                    <?php endif; ?>
                    <div class="tzcat">
                        CATEGORY : <?php the_terms( $post -> ID, 'portfolio-category','',',' ) ; ?>
                    </div>
                    <div class="author">
                        Author
                        <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>">
                            <?php the_author(); ?>
                        </a>
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

