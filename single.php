<?php get_header();

//  Single options show hide
$tz_plazarttheme_single_sidebar        =   ot_get_option('plazarttheme_singlesidebar',1);
$tz_plazarttheme_single_date           =   ot_get_option('plazarttheme_tzshowdate',1);
$tz_plazarttheme_single_category       =   ot_get_option('plazarttheme_tzshowcategory',1);
$tz_plazarttheme_single_tag            =   ot_get_option('plazarttheme_tzshowtag',1);
$tz_plazarttheme_single_share          =   ot_get_option('plazarttheme_tzshowshare',1);
$tz_plazarttheme_single_author         =   ot_get_option('plazarttheme_tzshowauthor',1);
$tz_plazarttheme_single_comment        =   ot_get_option('plazarttheme_tzshowcomment',1);


?>
<?php get_template_part('template_inc/inc','menu'); ?>
<section class="container home-post">
    <div class="row">
        <div class="col-md-9">

            <?php
            if ( have_posts() ) : while (have_posts()) : the_post() ;

                ?>
                <article id='post-<?php the_ID(); ?>' class="post-item">
                    <h1><?php  the_title(); ?></h1>

                    <?php if(has_post_format('gallery')) : ?>
                        <?php $tz_plazarttheme_gallery = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>

                        <?php if($tz_plazarttheme_gallery != '') : ?>
                            <div class="tz-single-slides flexslider">
                                <ul class="slides">
                                    <?php foreach($tz_plazarttheme_gallery as $tz_plazarttheme_image) :

                                        $tz_plazarttheme_image_src = wp_get_attachment_image_src( $tz_plazarttheme_image, 'full-thumb' );
                                        $tz_plazarttheme_caption = get_post_field('post_excerpt', $tz_plazarttheme_image); ?>

                                        <li><img src="<?php echo esc_url($tz_plazarttheme_image_src[0]); ?>" <?php if($tz_plazarttheme_caption) : ?>title="<?php echo esc_attr($tz_plazarttheme_caption); ?>"<?php endif; ?> width="<?php echo esc_attr($tz_plazarttheme_image_src[1]);?>" height ="<?php echo esc_attr($tz_plazarttheme_image_src[2]); ?>"/></li>

                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php elseif(has_post_format('video')) : ?>
                        <?php $tz_plazarttheme_video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
                        <?php
                        if($tz_plazarttheme_video != ''):
                            ?>
                            <div class="tz-single-video">
                                <?php if(wp_oembed_get( $tz_plazarttheme_video )) : ?>
                                    <?php echo wp_oembed_get($tz_plazarttheme_video); ?>
                                <?php else : ?>
                                    <?php echo balanceTags($tz_plazarttheme_video); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif;?>
                    <?php elseif(has_post_format('audio')) : ?>
                        <?php $tz_plazarttheme_audio = get_post_meta( get_the_ID(), '_format_audio_embed', true ); ?>

                        <?php if($tz_plazarttheme_audio != '') : ?>
                            <div class="tz-single-audio">
                                <?php if(wp_oembed_get( $tz_plazarttheme_audio )) : ?>
                                    <?php echo wp_oembed_get($tz_plazarttheme_audio); ?>
                                <?php else : ?>
                                    <?php echo balanceTags($tz_plazarttheme_audio); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php elseif(has_post_format('link')) : ?>
                        <?php $tz_plazarttheme_link = get_post_meta( get_the_ID(), '_format_link_url', true ); ?>
                        <?php
                        if($tz_plazarttheme_link != ''):
                            ?>
                            <a class="tz-single-link" href="<?php echo esc_url($tz_plazarttheme_link); ?>" target="_blank">
                                <?php echo esc_url($tz_plazarttheme_link); ?>
                            </a>
                        <?php endif;?>
                    <?php elseif(has_post_format('quote')) : ?>
                        <?php   $tz_plazarttheme_quote_name = get_post_meta( get_the_ID(), '_format_quote_source_name', true );
                                $tz_plazarttheme_quote_url  = get_post_meta( get_the_ID(), '_format_quote_source_url', true );?>
                        <?php   if($tz_plazarttheme_quote_url == '' && $tz_plazarttheme_quote_name != ''): ?>
                            <h5><?php echo esc_html($tz_plazarttheme_quote_name); ?></h5>
                        <?php endif;?>
                        <?php   if($tz_plazarttheme_quote_url != '' && $tz_plazarttheme_quote_name != ''):
                            ?>
                            <a class="tz-single-link" href="<?php echo esc_url($tz_plazarttheme_quote_url); ?>" target="_blank">
                                <?php echo esc_html($tz_plazarttheme_quote_name); ?>
                            </a>
                        <?php endif;?>

                    <?php else : ?>
                        <div class="tz-single-thumbbox">
                            <div class="tz-single-thumbnail">
                                <?php the_post_thumbnail();?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php
                    if( $tz_plazarttheme_single_tag == 1 ) :
                        if( get_the_tags() != false) : ?>
                            <div class="tztag">
                                <em>TAG:</em> <?php the_tags('',',','') ; ?>
                            </div>
                        <?php endif;
                    endif; ?>
                    <?php
                    if( $tz_plazarttheme_single_category == 1 ) :
                        if( get_the_category() != false) : ?>
                            <div class="tzcat">
                                <em>CATEGORY :</em> <?php the_category('',',',''); ?>
                            </div>
                        <?php endif;
                    endif; ?>
                    <div class="tzcontent">
                        <?php
                            the_content();
                            wp_link_pages();
                        ?>
                    </div>
                </article>
                <?php
            endwhile; // end while ( have_posts )
            endif; // end if ( have_posts )
            ?>

        </div>
        <div class="col-md-3 tzsidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>

