<?php
    /*
     * Template Name: Template portfolio
     */
?>
<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php
// OPTION FOR PAGE PORFOLIO
$tz_plazarttheme_catid          =  get_post_meta( get_the_ID(), 'plazarttheme_portfolio_catid', true ) ;
$tz_plazarttheme_filter         =  get_post_meta( get_the_ID() , 'plazarttheme_porfolio_filter', true ) ;
$tz_plazarttheme_filter_status  =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_filter_status', true ) ;
$tz_plazarttheme_limit          =  get_post_meta( get_the_ID(), 'plazarttheme_portfolio_limit', true ) ;
$tz_plazarttheme_orderby        =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_orderby', true ) ;
$tz_plazarttheme_order          =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_order', true ) ;
$tz_plazarttheme_paging         =  get_post_meta( get_the_ID(), 'plazarttheme_paging', true ) ;
$tz_plazarttheme_sidebar        =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_sidebar', true ) ;


$tz_plazarttheme_class_sidebar = 'col-md-12';
if($tz_plazarttheme_sidebar == 1){
    $tz_plazarttheme_class_sidebar = 'col-md-9';
}
?>
<div class="tzPortfolio_Container">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($tz_plazarttheme_class_sidebar);?>">
                <?php if ( $tz_plazarttheme_filter_status == 'show' ) : ?>
                    <div class="tzFilter" data-option-key="filter">
                        <button data-option-value="*" class="selected">Show all</button>
                        <?php
                            $tz_plazarttheme_terms = get_terms($tz_plazarttheme_filter) ;
                            if ( isset ( $tz_plazarttheme_terms ) && $tz_plazarttheme_terms != false && $tz_plazarttheme_terms != '' ):
                                foreach ( $tz_plazarttheme_terms as $tz_plazarttheme_term ) :
                        ?>
                                    <button class="TZHide" id="<?php echo 'plazarttheme-'.esc_attr($tz_plazarttheme_term -> slug); ?>" data-option-value=".<?php echo 'plazarttheme-'.esc_attr($tz_plazarttheme_term -> slug); ?>"><?php echo esc_html($tz_plazarttheme_term -> name); ?></button>
                        <?php
                                endforeach ;
                            endif ;
                        ?>
                    </div><!--end class tzFilter-->
                <?php endif; ?>
                <div class="tzPortfolio">
                    <?php
                        if ( get_query_var('paged') ):
                            $tz_plazarttheme_paged = get_query_var('paged');
                        else:
                            $tz_plazarttheme_paged = 1;
                        endif;
                        if( isset($tz_plazarttheme_catid) && !empty($tz_plazarttheme_catid)){
                            $tz_plazarttheme_cat = array();
                            if(is_array($tz_plazarttheme_catid)){
                                sort($tz_plazarttheme_catid);
                                $tz_plazarttheme_count_cat  =   count($tz_plazarttheme_catid);

                                for($tz_plazarttheme_i=0; $tz_plazarttheme_i<$tz_plazarttheme_count_cat; $tz_plazarttheme_i++){
                                    $tz_plazarttheme_cat[]  =   (int)$tz_plazarttheme_catid[$tz_plazarttheme_i];
                                }

                            }else{
                                $tz_plazarttheme_cat[]    = (int)$tz_plazarttheme_catid;
                            }
                            $tz_plazarttheme_args = array(
                                'post_type'         =>  'portfolio',
                                'paged'             =>  $tz_plazarttheme_paged,
                                'posts_per_page'    =>  $tz_plazarttheme_limit,
                                'orderby'           =>  $tz_plazarttheme_orderby,
                                'order'             =>  $tz_plazarttheme_order,
                                'tax_query'         =>  array(
                                    array(
                                        'taxonomy'  =>  'portfolio-category',
                                        'filed'     =>  'id',
                                        'terms'      =>  $tz_plazarttheme_cat
                                    )
                                )
                            );
                        }else{
                            $args = array(
                                'post_type'         =>  'portfolio',
                                'paged'             =>  $tz_plazarttheme_paged,
                                'posts_per_page'    =>  $tz_plazarttheme_limit,
                                'orderby'           =>  $tz_plazarttheme_orderby,
                                'order'             =>  $tz_plazarttheme_order,
                            );
                        }

                        $tz_plazarttheme_query = new WP_Query( $tz_plazarttheme_args ) ;
                        if ( $tz_plazarttheme_query -> have_posts() ): while ( $tz_plazarttheme_query -> have_posts() ): $tz_plazarttheme_query -> the_post() ;
                            $tz_plazarttheme_terms_post = get_the_terms( $post -> ID, $tz_plazarttheme_filter );
                            $tz_plazarttheme_feature    = get_post_meta( $post -> ID, 'plazarttheme_portfolio_featured', true );
                            $tz_plazarttheme_class_filter  = '';
                            $tz_plazarttheme_class_feature = '';
                             if ( isset ( $tz_plazarttheme_terms_post ) && $tz_plazarttheme_terms_post != false && $tz_plazarttheme_terms_post != '' ):
                                 foreach ( $tz_plazarttheme_terms_post as $tz_plazarttheme_term_item ):
                                     $tz_plazarttheme_class_filter .= 'plazarttheme-'.$tz_plazarttheme_term_item -> slug .' ';
                                 endforeach;
                             endif;
                            if ( $tz_plazarttheme_feature == 'yes' ) :
                                $tz_plazarttheme_class_feature = 'tz_feature_item';
                            endif;


                    ?>
                        <div id="post-<?php the_ID() ; ?>" <?php post_class("portfolio-item $tz_plazarttheme_class_filter $tz_plazarttheme_class_feature") ; ?>>
                            <div class="tz-inner">
                                <div class="item-img">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if ( get_the_terms( $post->ID, 'portfolio-tags' ) !=  false ): ?>
                                    <div class="tztag">
                                        TAG: <?php the_terms( $post -> ID, 'portfolio-tags','',',' ) ; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="tzcat">
                                    CATEGORY : <?php the_terms( $post -> ID, 'portfolio-category','',',' ) ; ?>
                                </div>
                                <div class="description">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                            endwhile; // end while have posts
                        endif;  // end if have posts
                        wp_reset_postdata();
                    ?>
                </div><!--end class tzPortfolio-->
                <?php
                $tz_plazarttheme_load_class = '';

                if ( $tz_plazarttheme_paging != 'pagenavi'  ):

                    $tz_plazarttheme_load_class = "class ='not_pagenavi'" ;
                endif;

                $tz_plazarttheme_ajaxbutton_class = '';
                if ( $tz_plazarttheme_paging != 'ajaxbutton'  ):
                    $tz_plazarttheme_ajaxbutton_class = "class ='not_pagenavi'" ;
                endif;
                ?>
                    <div id="tz_append" <?php echo esc_attr($tz_plazarttheme_ajaxbutton_class); ?>>
                        <a href="#tz_append">Load More Projects</a>
                    </div><!--end id tz_append-->
                <div id="loadajax" <?php echo esc_attr($tz_plazarttheme_load_class); ?>>
                    <?php tz_plazarttheme_custom_paging_nav($tz_plazarttheme_query->max_num_pages);  ?>
                </div>
            </div><!--end class col-md-9-->
            <?php
            if($tz_plazarttheme_sidebar == 1){
                get_sidebar();
            }
            ?>
        </div>
    </div><!--end class container-->
</div>
<?php get_footer(); ?>