<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if(!is_admin()):


        add_action('wp_head','tz_plazarttheme_config_theme');

        function tz_plazarttheme_config_theme(){
            $styles ='';
            $styles.='/**
* 1.0 - Reset
* -----------------------------------------------------------------------------
*/
';

            // logo
            $tz_plazarttheme_colorlogo  =   ot_get_option('plazarttheme_logoTextcolor');
            if(isset($tz_plazarttheme_colorlogo) && !empty($tz_plazarttheme_colorlogo)){
                $styles.='.tz_logo .tz-logo-text{ color: '.$tz_plazarttheme_colorlogo.' }';
            }

    /*   Fonts-option   */
        /*  Font-body   */
            $tz_plazarttheme_body_font_type       =    ot_get_option('plazarttheme_TZFontType');
            $tz_plazarttheme_body_font_family     =    ot_get_option('plazarttheme_TzFontFaminy');
            $tz_plazarttheme_body_font_weight     =    ot_get_option('plazarttheme_TzFontFami');
            $tz_plazarttheme_body_font_selecter       =   ot_get_option('plazarttheme_TzBodySelecter');
            $tz_plazarttheme_body_font_default      =   ot_get_option('plazarttheme_TzFontDefault');
            $tz_plazarttheme_body_font_color    = ot_get_option('plazarttheme_TzBodyColor');

            switch($tz_plazarttheme_body_font_type){
                case'Tzgoogle':
                        $tz_plazarttheme_body_font = $tz_plazarttheme_body_font_family;
                    break;
                default:
                    $tz_plazarttheme_body_font = $tz_plazarttheme_body_font_default;
                    break;

            }
            if( isset($tz_plazarttheme_body_font_selecter) && !empty($tz_plazarttheme_body_font_selecter)){
                if( $tz_plazarttheme_body_font != 'Default' ) {
                    $styles.=''.balanceTags($tz_plazarttheme_body_font_selecter).'{font-family:"'.esc_attr($tz_plazarttheme_body_font).'" !important;}';
                }
                if( isset($tz_plazarttheme_body_font_color) && !empty($tz_plazarttheme_body_font_color)) {
                    $styles.=''.balanceTags($tz_plazarttheme_body_font_selecter).'{color:'.esc_attr($tz_plazarttheme_body_font_color) .' !important;}';
                }
                if( isset($tz_plazarttheme_body_font_weight) && !empty($tz_plazarttheme_body_font_weight)) {
                    $styles.=''.balanceTags($tz_plazarttheme_body_font_selecter).'{font-weight: '.esc_attr($tz_plazarttheme_body_font_weight).' !important;}';
                }
            }

        /*  Font-head   */
            $tz_plazarttheme_head_font_type       =    ot_get_option('plazarttheme_TZFontTypeHead');
            $tz_plazarttheme_head_font_family     =    ot_get_option('plazarttheme_TzFontFaminyHead');
            $tz_plazarttheme_head_font_weight     =    ot_get_option('plazarttheme_TzFontHeadGoodurl');
            $tz_plazarttheme_head_font_selecter   =   ot_get_option('plazarttheme_TzHeadSelecter');
            $tz_plazarttheme_head_font_default     =   ot_get_option('plazarttheme_TzFontHeadDefault');
            $tz_plazarttheme_head_font_color  = ot_get_option('plazarttheme_TzHeaderFontColor');

            switch($tz_plazarttheme_head_font_type){
                case'Tzgoogle':
                        $tz_plazarttheme_head_font = $tz_plazarttheme_head_font_family;
                    break;
                default:
                    $tz_plazarttheme_head_font = $tz_plazarttheme_head_font_default;
                    break;

            }
            if( isset($tz_plazarttheme_head_font_selecter) && !empty($tz_plazarttheme_head_font_selecter)){
                if( $tz_plazarttheme_head_font != 'Default' ) {
                    $styles.=''.balanceTags($tz_plazarttheme_head_font_selecter).'{font-family:"'.esc_attr($tz_plazarttheme_head_font).'" !important;}';
                }
                if( isset($tz_plazarttheme_head_font_color) && !empty($tz_plazarttheme_head_font_color)) {
                    $styles.=''.balanceTags($tz_plazarttheme_head_font_selecter).'{color:'.esc_attr($tz_plazarttheme_head_font_color) .' !important;}';
                }
                if( isset($tz_plazarttheme_head_font_weight) && !empty($tz_plazarttheme_head_font_weight)) {
                    $styles.=''.balanceTags($tz_plazarttheme_head_font_selecter).'{font-weight: '.esc_attr($tz_plazarttheme_head_font_weight).' !important;}';
                }
            }


        /*  Font-menu   */
            $tz_plazarttheme_menu_font_type       =    ot_get_option('plazarttheme_TZFontTypeMenu');
            $tz_plazarttheme_menu_font_family     =    ot_get_option('plazarttheme_TzFontFaminyMenu');
            $tz_plazarttheme_menu_font_weight     =    ot_get_option('plazarttheme_TzFontMenuGoodurl');
            $tz_plazarttheme_menu_font_selecter   =   ot_get_option('plazarttheme_TzMenuSelecter');
            $tz_plazarttheme_menu_font_default    =   ot_get_option('plazarttheme_TzFontMenuDefault');
            $tz_plazarttheme_menu_font_color    = ot_get_option('plazarttheme_TzMenuFontColor');

            switch($tz_plazarttheme_menu_font_type){
                case'Tzgoogle':
                        $tz_plazarttheme_menu_font = $tz_plazarttheme_menu_font_family;
                    break;
                default:
                    $tz_plazarttheme_menu_font = $tz_plazarttheme_menu_font_default;
                    break;

            }
            if( isset($tz_plazarttheme_menu_font_selecter) && !empty($tz_plazarttheme_menu_font_selecter)){
                if( $tz_plazarttheme_menu_font != 'Default' ) {
                    $styles.=''.balanceTags($tz_plazarttheme_menu_font_selecter).'{font-family:"'.esc_attr($tz_plazarttheme_menu_font).'" !important;}';
                }
                if( isset($tz_plazarttheme_menu_font_color) && !empty($tz_plazarttheme_menu_font_color)) {
                    $styles.=''.balanceTags($tz_plazarttheme_menu_font_selecter).'{color:'.esc_attr($tz_plazarttheme_menu_font_color) .' !important;}';
                }
                if( isset($tz_plazarttheme_menu_font_weight) && !empty($tz_plazarttheme_menu_font_weight)) {
                    $styles.=''.balanceTags($tz_plazarttheme_menu_font_selecter).'{font-weight: '.esc_attr($tz_plazarttheme_menu_font_weight).' !important;}';
                }
            }

        /*  Font-custom   */
            $tz_plazarttheme_custom_font_type     =    ot_get_option('plazarttheme_TZFontTypeCustom');
            $tz_plazarttheme_custom_font_family   =    ot_get_option('plazarttheme_TzFontFaminyCustom');
            $tz_plazarttheme_custom_font_weight   =    ot_get_option('plazarttheme_TzFontCustomGoodurl');
            $tz_plazarttheme_custom_font_selecter  =   ot_get_option('plazarttheme_TzCustomSelecter');
            $tz_plazarttheme_custom_font_default  =   ot_get_option('plazarttheme_TzFontCustomDefault');
            $tz_plazarttheme_custom_font_color     = ot_get_option('plazarttheme_TzCustomFontColor');

            switch($tz_plazarttheme_custom_font_type){
                case'Tzgoogle':
                        $tz_plazarttheme_custom_font = $tz_plazarttheme_custom_font_family;
                    break;
                default:
                    $tz_plazarttheme_custom_font = $tz_plazarttheme_custom_font_default;
                    break;

            }
            if( isset($tz_plazarttheme_custom_font_selecter) && !empty($tz_plazarttheme_custom_font_selecter)){
                if( $tz_plazarttheme_custom_font != 'Default' ) {
                    $styles.=''.balanceTags($tz_plazarttheme_custom_font_selecter).'{font-family:"'.esc_attr($tz_plazarttheme_custom_font).'" !important;}';
                }
                if( isset($tz_plazarttheme_custom_font_color) && !empty($tz_plazarttheme_custom_font_color)) {
                    $styles.=''.balanceTags($tz_plazarttheme_custom_font_selecter).'{color:'.esc_attr($tz_plazarttheme_custom_font_color) .' !important;}';
                }
                if( isset($tz_plazarttheme_custom_font_weight) && !empty($tz_plazarttheme_custom_font_weight)) {
                    $styles.=''.balanceTags($tz_plazarttheme_custom_font_selecter).'{font-weight: '.esc_attr($tz_plazarttheme_custom_font_weight).' !important;}';
                }
            }

    /*   End-Fonts-option   */

            // add Custom css
            $tz_plazarttheme_customcss = ot_get_option('plazarttheme_TzCustomCss','');
            if(isset($tz_plazarttheme_customcss) && !empty($tz_plazarttheme_customcss)){
                $styles.= esc_attr($tz_plazarttheme_customcss);
            }
            // end custom css



            /*   Themecolor-option   */
            $tz_plazarttheme_color_type     =    ot_get_option('plazarttheme_TZTypecolor');
            $tz_plazarttheme_color          =    ot_get_option('plazarttheme_TZThemecustom');
            if( isset($tz_plazarttheme_color_type) && $tz_plazarttheme_color_type == '1' ){
                $styles.= '';
            }


           //Background
            $tz_plazarttheme_default_background_type    =   ot_get_option('plazarttheme_background_type');
            $tz_plazarttheme_default_pattern            =   ot_get_option('plazarttheme_background_pattern');
            $tz_plazarttheme_default_single_image       =   ot_get_option('plazarttheme_background_single_image');

            switch($tz_plazarttheme_default_background_type){
                case 'pattern':
                    echo '<style>';
                    echo 'body#bd {background: url("' . get_template_directory_uri() .'/images/patterns/' . $tz_plazarttheme_default_pattern . '") repeat scroll 0 0 transparent !important;}';
                    echo '</style>';
                    break;
                case 'single_image':
                    echo '<style>';
                    echo 'body#bd {background: url("' . $tz_plazarttheme_default_single_image . '") no-repeat fixed center center / cover transparent !important;}';
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
                    $tz_plazarttheme_favicon = ot_get_option('plazarttheme_favicon');
                    if( $tz_plazarttheme_favicon ){
                        echo '<link rel="shortcut icon" href="' . esc_url($tz_plazarttheme_favicon) . '" type="image/x-icon" />';
                    }
                }
            }
            ?>

        <?php
            tz_plazarttheme_CustomCss($styles,'custom');
        }

    endif

?>