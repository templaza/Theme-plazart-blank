
<?php
    $tz_plazarttheme_logotype   =   ot_get_option('plazarttheme_logotype','text');
    $tz_plazarttheme_text       =   ot_get_option('plazarttheme_logoText','tz-plazarttheme');
    $tz_plazarttheme_text_color =   ot_get_option('plazarttheme_logoTextcolor','');
    $tz_plazarttheme_img_url    =   ot_get_option('plazarttheme_logo','');

?>

<header class="tz-header">
        <div class="container">
            <button data-target=".nav-collapse" class="btn-navbar tz_icon_menu" type="button">
                <i class="fa fa-bars"></i>
            </button>
            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                <?php

                if($tz_plazarttheme_logotype == 0){
                    echo ('<span class="tz-logo-text">'.esc_html($tz_plazarttheme_text).'</span>');
                }else{
                    if ( isset($tz_plazarttheme_img_url) && !empty( $tz_plazarttheme_img_url ) ) :
                        echo'<img src="'.esc_url($tz_plazarttheme_img_url).'" alt="'.get_bloginfo('title').'" />';
                    else :
                        echo'<img src="'.esc_url(get_template_directory_uri()).'/images/logo.png" alt="'.get_bloginfo('title').'" width="217" height="38" />';
                    endif;
                }
                ?>
            </a>
            <nav class="nav-collapse pull-right">
                    <?php

                    if ( has_nav_menu('primary') ) :
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'nav navbar-nav tz-nav',
                            'container'      => false
                        ) ) ;
                    endif;

                    ?>
            </nav>
        </div><!--end class container-->
</header>