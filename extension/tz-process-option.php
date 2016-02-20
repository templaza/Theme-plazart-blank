<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if(!is_admin()):


        add_action('wp_head','plazarttheme_config_theme');

        function plazarttheme_config_theme(){
            $styles ='';
            $styles.='/**
* 1.0 - Reset
* -----------------------------------------------------------------------------
*/
';

            // logo
            $plazarttheme_colorlogo  =   ot_get_option('plazarttheme_logoTextcolor');
            if(isset($plazarttheme_colorlogo) && !empty($plazarttheme_colorlogo)){
                $styles.='.tz_logo .tz-logo-text{ color: '.$plazarttheme_colorlogo.' }';
            }

    /*   Fonts-option   */
        /*  Font-body   */
            $plazarttheme_body_font_type       =    ot_get_option('plazarttheme_TZFontType');
            $plazarttheme_body_font_family     =    ot_get_option('plazarttheme_TzFontFaminy');
            $plazarttheme_body_font_weight     =    ot_get_option('plazarttheme_TzFontFami');
            $plazarttheme_body_font_selecter       =   ot_get_option('plazarttheme_TzBodySelecter');
            $plazarttheme_body_font_default      =   ot_get_option('plazarttheme_TzFontDefault');
            $plazarttheme_body_font_color    = ot_get_option('plazarttheme_TzBodyColor');

            switch($plazarttheme_body_font_type){
                case'Tzgoogle':
                        $plazarttheme_body_font = $plazarttheme_body_font_family;
                    break;
                default:
                    $plazarttheme_body_font = $plazarttheme_body_font_default;
                    break;

            }
            if( isset($plazarttheme_body_font_selecter) && !empty($plazarttheme_body_font_selecter)){
                if( $plazarttheme_body_font != 'Default' ) {
                    $styles.=''.balanceTags($plazarttheme_body_font_selecter).'{font-family:"'.esc_attr($plazarttheme_body_font).'" !important;}';
                }
                if( isset($plazarttheme_body_font_color) && !empty($plazarttheme_body_font_color)) {
                    $styles.=''.balanceTags($plazarttheme_body_font_selecter).'{color:'.esc_attr($plazarttheme_body_font_color) .' !important;}';
                }
                if( isset($plazarttheme_body_font_weight) && !empty($plazarttheme_body_font_weight)) {
                    $styles.=''.balanceTags($plazarttheme_body_font_selecter).'{font-weight: '.esc_attr($plazarttheme_body_font_weight).' !important;}';
                }
            }

        /*  Font-head   */
            $plazarttheme_head_font_type       =    ot_get_option('plazarttheme_TZFontTypeHead');
            $plazarttheme_head_font_family     =    ot_get_option('plazarttheme_TzFontFaminyHead');
            $plazarttheme_head_font_weight     =    ot_get_option('plazarttheme_TzFontHeadGoodurl');
            $plazarttheme_head_font_selecter   =   ot_get_option('plazarttheme_TzHeadSelecter');
            $plazarttheme_head_font_default     =   ot_get_option('plazarttheme_TzFontHeadDefault');
            $plazarttheme_head_font_color  = ot_get_option('plazarttheme_TzHeaderFontColor');

            switch($plazarttheme_head_font_type){
                case'Tzgoogle':
                        $plazarttheme_head_font = $plazarttheme_head_font_family;
                    break;
                default:
                    $plazarttheme_head_font = $plazarttheme_head_font_default;
                    break;

            }
            if( isset($plazarttheme_head_font_selecter) && !empty($plazarttheme_head_font_selecter)){
                if( $plazarttheme_head_font != 'Default' ) {
                    $styles.=''.balanceTags($plazarttheme_head_font_selecter).'{font-family:"'.esc_attr($plazarttheme_head_font).'" !important;}';
                }
                if( isset($plazarttheme_head_font_color) && !empty($plazarttheme_head_font_color)) {
                    $styles.=''.balanceTags($plazarttheme_head_font_selecter).'{color:'.esc_attr($plazarttheme_head_font_color) .' !important;}';
                }
                if( isset($plazarttheme_head_font_weight) && !empty($plazarttheme_head_font_weight)) {
                    $styles.=''.balanceTags($plazarttheme_head_font_selecter).'{font-weight: '.esc_attr($plazarttheme_head_font_weight).' !important;}';
                }
            }


        /*  Font-menu   */
            $plazarttheme_menu_font_type       =    ot_get_option('plazarttheme_TZFontTypeMenu');
            $plazarttheme_menu_font_family     =    ot_get_option('plazarttheme_TzFontFaminyMenu');
            $plazarttheme_menu_font_weight     =    ot_get_option('plazarttheme_TzFontMenuGoodurl');
            $plazarttheme_menu_font_selecter   =   ot_get_option('plazarttheme_TzMenuSelecter');
            $plazarttheme_menu_font_default    =   ot_get_option('plazarttheme_TzFontMenuDefault');
            $plazarttheme_menu_font_color    = ot_get_option('plazarttheme_TzMenuFontColor');

            switch($plazarttheme_menu_font_type){
                case'Tzgoogle':
                        $plazarttheme_menu_font = $plazarttheme_menu_font_family;
                    break;
                default:
                    $plazarttheme_menu_font = $plazarttheme_menu_font_default;
                    break;

            }
            if( isset($plazarttheme_menu_font_selecter) && !empty($plazarttheme_menu_font_selecter)){
                if( $plazarttheme_menu_font != 'Default' ) {
                    $styles.=''.balanceTags($plazarttheme_menu_font_selecter).'{font-family:"'.esc_attr($plazarttheme_menu_font).'" !important;}';
                }
                if( isset($plazarttheme_menu_font_color) && !empty($plazarttheme_menu_font_color)) {
                    $styles.=''.balanceTags($plazarttheme_menu_font_selecter).'{color:'.esc_attr($plazarttheme_menu_font_color) .' !important;}';
                }
                if( isset($plazarttheme_menu_font_weight) && !empty($plazarttheme_menu_font_weight)) {
                    $styles.=''.balanceTags($plazarttheme_menu_font_selecter).'{font-weight: '.esc_attr($plazarttheme_menu_font_weight).' !important;}';
                }
            }

        /*  Font-custom   */
            $plazarttheme_custom_font_type     =    ot_get_option('plazarttheme_TZFontTypeCustom');
            $plazarttheme_custom_font_family   =    ot_get_option('plazarttheme_TzFontFaminyCustom');
            $plazarttheme_custom_font_weight   =    ot_get_option('plazarttheme_TzFontCustomGoodurl');
            $plazarttheme_custom_font_selecter  =   ot_get_option('plazarttheme_TzCustomSelecter');
            $plazarttheme_custom_font_default  =   ot_get_option('plazarttheme_TzFontCustomDefault');
            $plazarttheme_custom_font_color     = ot_get_option('plazarttheme_TzCustomFontColor');

            switch($plazarttheme_custom_font_type){
                case'Tzgoogle':
                        $plazarttheme_custom_font = $plazarttheme_custom_font_family;
                    break;
                default:
                    $plazarttheme_custom_font = $plazarttheme_custom_font_default;
                    break;

            }
            if( isset($plazarttheme_custom_font_selecter) && !empty($plazarttheme_custom_font_selecter)){
                if( $plazarttheme_custom_font != 'Default' ) {
                    $styles.=''.balanceTags($plazarttheme_custom_font_selecter).'{font-family:"'.esc_attr($plazarttheme_custom_font).'" !important;}';
                }
                if( isset($plazarttheme_custom_font_color) && !empty($plazarttheme_custom_font_color)) {
                    $styles.=''.balanceTags($plazarttheme_custom_font_selecter).'{color:'.esc_attr($plazarttheme_custom_font_color) .' !important;}';
                }
                if( isset($plazarttheme_custom_font_weight) && !empty($plazarttheme_custom_font_weight)) {
                    $styles.=''.balanceTags($plazarttheme_custom_font_selecter).'{font-weight: '.esc_attr($plazarttheme_custom_font_weight).' !important;}';
                }
            }

    /*   End-Fonts-option   */

            // add Custom css
            $plazarttheme_customcss = ot_get_option('plazarttheme_TzCustomCss','');
            if(isset($plazarttheme_customcss) && !empty($plazarttheme_customcss)){
                $styles.= esc_attr($plazarttheme_customcss);
            }
            // end custom css



            /*   Themecolor-option   */
            $plazarttheme_color_type     =    ot_get_option('plazarttheme_TZTypecolor');
            $plazarttheme_color          =    ot_get_option('plazarttheme_TZThemecustom');
            if( isset($plazarttheme_color_type) && $plazarttheme_color_type == '1' ){
                $styles.= '';
            }


           //Background
            $plazarttheme_default_background_type    =   ot_get_option('plazarttheme_background_type');
            $plazarttheme_default_pattern            =   ot_get_option('plazarttheme_background_pattern');
            $plazarttheme_default_single_image       =   ot_get_option('plazarttheme_background_single_image');

            switch($plazarttheme_default_background_type){
                case 'pattern':
                    echo '<style>';
                    echo 'body#bd {background: url("' . get_template_directory_uri() .'/images/patterns/' . $plazarttheme_default_pattern . '") repeat scroll 0 0 transparent !important;}';
                    echo '</style>';
                    break;
                case 'single_image':
                    echo '<style>';
                    echo 'body#bd {background: url("' . $plazarttheme_default_single_image . '") no-repeat fixed center center / cover transparent !important;}';
                    echo '</style>';
                    break;
                case 'default':
                    echo '';
                    break;
                default:
                    echo '';
                    break;
            }

            ?>

            <?php
            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
                if(ot_get_option( 'plazarttheme_favicon_onoff','no') == 'yes'){
                    $plazarttheme_favicon = ot_get_option('plazarttheme_favicon');
                    if( $plazarttheme_favicon ){
                        echo '<link rel="shortcut icon" href="' . esc_url($plazarttheme_favicon) . '" type="image/x-icon" />';
                    }
                }
            }
            ?>

        <?php
            plazarttheme_CustomCss($styles,'custom');
        }

    endif

?>