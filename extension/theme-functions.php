<?php
  // enable and register custom sidebar
add_action( 'widgets_init', 'tz_plazarttheme_slug_widgets_init' );
function tz_plazarttheme_slug_widgets_init() {
    if (function_exists('register_sidebar')) {
        // default sidebar array
        $tz_plazarttheme_sidebar_attr = array(
            'name'          => '',
            'id'            => '',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        );
        $tz_plazarttheme_sidebars = array(
            "plazarttheme-sidebar-right"          =>  array("Display sidebar on all page","Sidebar Right"),
            "plazarttheme-sidebar-event"          =>  array("Display sidebar on all page","Sidebar Left"),
            "plazarttheme-footer-one"             =>  array("Display footer on all page","Footer 1"),
            "plazarttheme-footer-two"             =>  array("Display footer on all page","Footer 2"),
            "plazarttheme-footer-three"           =>  array("Display footer on all page","Footer 3"),
            "plazarttheme-footer-four"            =>  array("Display footer on all page","Footer 4"),
        );
        foreach ($tz_plazarttheme_sidebars as $tz_plazarttheme_key=>$tz_plazarttheme_value) {
            $tz_plazarttheme_sidebar_attr['id'] = $tz_plazarttheme_key;
            $tz_plazarttheme_sidebar_attr['description']=$tz_plazarttheme_value[0];
            $tz_plazarttheme_sidebar_attr['name'] = $tz_plazarttheme_value[1];
            register_sidebar($tz_plazarttheme_sidebar_attr);
        }
    }
}

    if ( ! function_exists( 'tz_plazarttheme_comment' ) ) :
        function tz_plazarttheme_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment;
            switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
                    // Display trackbacks differently than normal comments.
                    ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
              <p><?php esc_html_e( 'Pingback:','tz-plazarttheme' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'tz-plazarttheme' ), '<span class="edit-link">', '</span>' ); ?></p>
                    <?php
                    break;
                default :
                    // Proceed with normal comments.
                    global $post;
                    ?>
                    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
                            <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','tz-plazarttheme' ); ?></p>
                            <?php endif; ?>
                            <div class="comment-author">
                                <?php echo get_avatar( $comment, 59 ); ?>
                            </div>
                            <div class="comment-content">
                                <?php
                                printf( '<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( '- Post Author ', 'tz-plazarttheme' ) . '</span>' : ''
                                );
                                ?>
                                    <span class="comment-metadata">
                                        <?php
                                            printf( '<a class="comments-datetime" href="%1$s">&nbsp;&nbsp;&nbsp;<time datetime="%2$s">%3$s</time></a>',
                                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                                get_comment_time( 'c' ),
                                                /* translators: 1: date, 2: time */
                                                sprintf( esc_html__( '%1$s', 'tz-plazarttheme' ), get_comment_date('d M, Y') )
                                            );
                                        ?>
                                        <?php
                                        edit_comment_link( esc_html__( 'Edit ', 'tz-plazarttheme' ) );
                                        comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'tz-plazarttheme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                                        ?>
                                    </span>
                                <?php comment_text(); ?>
                            </div><!--comment-content -->

                        </article><!-- #comment-## -->
                    <?php
                    break;
            endswitch; // end comment_type check
        }
    endif;
?>