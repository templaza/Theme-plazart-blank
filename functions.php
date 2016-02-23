<?php

/*
 *constants
 */

define('THEME_PREFIX', 'tz-plazarttheme');
define('THEME_NAME', 'tz-plazarttheme');
define('TEXT_DOMAIN', 'tz-plazarttheme');
define('THEME_VERSION', '1.0');
define('get_template_directory_uri()', get_template_directory_uri());
define('SERVER_PATH', get_template_directory());
define( 'CSS_PATH', get_template_directory_uri().'/css/' );
define( 'JS_PATH', get_template_directory_uri().'/js/');
define( 'IMG_PATH', get_template_directory_uri().'/images/');
define( 'FONT_PATH', get_template_directory_uri().'/fonts/');


function tz_plazarttheme_setup(){
    /**
     * Text domain
     */
    load_theme_textdomain('tz-plazarttheme', get_template_directory() . '/languages');


    /**
     * plazarttheme setup.
     *
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support post thumbnails.
     *
     */
    //Enable support for Header (tz-demo)
    add_theme_support( 'custom-header' );

    //Enable support for Background (tz-demo)
    add_theme_support( 'custom-background' );

    //Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menu('primary','Primary Menu');

    // add theme support title-tag
    add_theme_support( 'title-tag' );

    /*  Post Type   */
    add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','quote' ) );


}
add_action( 'after_setup_theme', 'tz_plazarttheme_setup' );


/*  (tz-demo)    */
function tz_plazarttheme_add_editor_styles() {
    add_editor_style();
}
add_action( 'admin_init', 'tz_plazarttheme_add_editor_styles' );



/**
 * Required: include plugin theme sidebars
 */
require SERVER_PATH . '/extension/theme-functions.php';

/*
 * Required: include plugin theme scripts
 */
require SERVER_PATH . '/extension/tz-process-option.php';


if ( class_exists('OT_Loader') ):
    /*
     * Required: List Google Fonts
     */
    require SERVER_PATH . '/extension/ot-support/list-google-fonts.php';

    /*
     * Required: Theme option
     */
    require SERVER_PATH . '/extension/ot-support/theme-options.php';

    /*
     * Required: Metabox
     */
    require SERVER_PATH . '/extension/ot-support/add-meta-boxes.php';
endif;


/*
 *  method add global javascript variable THEME_PREFIX to admin_head
 */
function tz_plazarttheme_addto_header() {
    ?>
    <script type="text/javascript">
        var themeprefix = '<?php echo esc_js('tz_plazarttheme') ?>';
    </script>
<?php
}
add_action('admin_head', 'tz_plazarttheme_addto_header');
add_action('wp_head', 'tz_plazarttheme_addto_header');


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 900;


/**
 * Show full editor
 */
function tz_plazarttheme_ilc_mce_buttons($buttons){
    array_push($buttons,
        "backcolor",
        "anchor",
        "hr",
        "sub",
        "sup",
        "fontselect",
        "fontsizeselect",
        "styleselect",
        "cleanup"
    );
    return $buttons;
}
add_filter("mce_buttons_2", "tz_plazarttheme_ilc_mce_buttons");

/*
 * Adds JavaScript to pages with the comment form to support
 * sites with threaded comments (when in use).
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );




if ( ! function_exists( 'tz_plazarttheme_paging_nav' ) ) {
    function tz_plazarttheme_paging_nav() {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }

        $tz_plazarttheme_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $tz_plazarttheme_pagenum_link = html_entity_decode( get_pagenum_link() );
        $tz_plazarttheme_query_args   = array();
        $tz_plazarttheme_url_parts    = explode( '?', $tz_plazarttheme_pagenum_link );

        if ( isset( $tz_plazarttheme_url_parts[1] ) ) {
            wp_parse_str( $tz_plazarttheme_url_parts[1], $tz_plazarttheme_query_args );
        }

        $tz_plazarttheme_pagenum_link = remove_query_arg( array_keys( $tz_plazarttheme_query_args ), $tz_plazarttheme_pagenum_link );
        $tz_plazarttheme_pagenum_link = trailingslashit( $tz_plazarttheme_pagenum_link ) . '%_%';

        $tz_plazarttheme_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $tz_plazarttheme_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $tz_plazarttheme_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $tz_plazarttheme_links = paginate_links( array(
            'base'     => $tz_plazarttheme_pagenum_link,
            'format'   => $tz_plazarttheme_format,
            'total'    => $wp_query->max_num_pages,
            'current'  => $tz_plazarttheme_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $tz_plazarttheme_query_args ),
            'prev_text' => esc_html__( 'Previous', 'tz-plazarttheme' ),
            'next_text' => esc_html__( 'Next', 'tz-plazarttheme' ),
        ) );

        if ( $tz_plazarttheme_links ) :

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo balanceTags($tz_plazarttheme_links); ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
        <?php
        endif;
    }
}



if ( ! function_exists( 'tz_plazarttheme_custom_paging_nav' ) ) {
    function tz_plazarttheme_custom_paging_nav($tz_plazarttheme_query_total) {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $tz_plazarttheme_query_total < 2 ) {
            return;
        }

        $tz_plazarttheme_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $tz_plazarttheme_pagenum_link = html_entity_decode( get_pagenum_link() );
        $tz_plazarttheme_query_args   = array();
        $tz_plazarttheme_url_parts    = explode( '?', $tz_plazarttheme_pagenum_link );

        if ( isset( $tz_plazarttheme_url_parts[1] ) ) {
            wp_parse_str( $tz_plazarttheme_url_parts[1], $tz_plazarttheme_query_args );
        }

        $tz_plazarttheme_pagenum_link = remove_query_arg( array_keys( $tz_plazarttheme_query_args ), $tz_plazarttheme_pagenum_link );
        $tz_plazarttheme_pagenum_link = trailingslashit( $tz_plazarttheme_pagenum_link ) . '%_%';

        $tz_plazarttheme_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $tz_plazarttheme_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $tz_plazarttheme_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $tz_plazarttheme_links = paginate_links( array(
            'base'     => $tz_plazarttheme_pagenum_link,
            'format'   => $tz_plazarttheme_format,
            'total'    => $tz_plazarttheme_query_total,
            'current'  => $tz_plazarttheme_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $tz_plazarttheme_query_args ),
            'prev_text' => esc_html__( 'Previous', 'tz-plazarttheme' ),
            'next_text' => esc_html__( 'Next', 'tz-plazarttheme' ),
        ) );

        if ( $tz_plazarttheme_links ) :

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo balanceTags($tz_plazarttheme_links); ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
        <?php
        endif;
    }
}




/*
 * Method add ot_get_option
 */

if(!is_admin()):

    if ( ! function_exists( 'ot_get_option' ) ) {
        function ot_get_option( $tz_plazarttheme_option_id, $tz_plazarttheme_default = '' ) {
            /* get the saved options */
            $tz_plazarttheme_options = get_option( 'option_tree' );
            /* look for the saved value */
            if ( isset( $tz_plazarttheme_options[$tz_plazarttheme_option_id] ) && '' != $tz_plazarttheme_options[$tz_plazarttheme_option_id] ) {
                return $tz_plazarttheme_options[$tz_plazarttheme_option_id];
            }
            return $tz_plazarttheme_default;
        }
    }

endif;



if ( function_exists( 'ot_get_option' ) ) {
    /*
     *  Method show or hide toolbar admin
     */
    $showtootbaradmin     =   ot_get_option('plazarttheme_TzGlobalOptionAdmin',1);
    if(isset($showtootbaradmin) && $showtootbaradmin==0){
        add_filter('show_admin_bar', '__return_false');
    }

    /*
     * Method limit excerpt
     */
    function limitexcerpt($lenght){
        return ot_get_option('plazarttheme_porlimitexcerpt',50) ;
    }
    add_filter('excerpt_length','limitexcerpt');
}


/*
 * ADD GOOGLE FONT
 */
if ( ! function_exists( 'tz_plazarttheme_slug_fonts_url' ) ) {
    function tz_plazarttheme_slug_fonts_url($tz_plazarttheme_name,$tz_plazarttheme_fontweight) {
        $tz_plazarttheme_fonts_url = '';

        if ( 'off' !== _x( 'on', $tz_plazarttheme_name.' font: on or off', 'tz-plazarttheme' ) ) {
            $tz_plazarttheme_font_families = array();
            $tz_plazarttheme_font_families[] = $tz_plazarttheme_name.':'.$tz_plazarttheme_fontweight;

            $tz_plazarttheme_query_args = array(
                'family' => urlencode( implode( '|', $tz_plazarttheme_font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $tz_plazarttheme_fonts_url = add_query_arg( $tz_plazarttheme_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $tz_plazarttheme_fonts_url );
    }
}


/*   Creat File Css   */
if ( ! function_exists( 'tz_plazarttheme_CustomCss' ) ) {
    function tz_plazarttheme_CustomCss($data='', $prefix='css') {
        $tem_path = get_template_directory();
        $folder_path=$tem_path."/css/custom";
        if (!is_dir($folder_path)) {
            wp_mkdir_p($folder_path);
            @chmod($folder_path, 0755);
        }
        $filename_css = $prefix.'-' . substr(md5($data), 0, 15) . '.css';
        $filename ='custom_options_css.css';
        $filepart = $folder_path . '/' . $filename;
        $filepart_css = $folder_path . '/' . $filename_css;

        $filetime = file_exists($filepart_css);
        if($filetime==false){

            foreach (glob(''.$folder_path.'/*.css') as $filenames) {
                if($filenames != $filepart_css){
//                unlink($filenames);
                }
            }
            global $wp_filesystem;
// Initialize the WP filesystem, no more using 'file-put-contents' function
            if (empty($wp_filesystem)) {
                require_once (ABSPATH . '/wp-admin/includes/file.php');
                WP_Filesystem();
            }

            if(!$wp_filesystem->put_contents( $filepart, $data, 0644) ) {
                return esc_html__('Failed to create css file', 'tz-plazarttheme');
            }

            if(!$wp_filesystem->put_contents( $filepart_css, $data, 0644) ) {
                return esc_html__('Failed to create css file', 'tz-plazarttheme');
            }
        }
    }
}

/*  Post Type   */
function tz_plazarttheme_vafpress_setup() {
    add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','quote' ) );
}
add_action( 'after_setup_theme', 'tz_plazarttheme_vafpress_setup' );

/*method activie plugin*/
require get_template_directory() . '/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'tz_plazarttheme_register_required_plugins' );
function tz_plazarttheme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $tz_plazarttheme_plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'     				=> 'Plazart', // The plugin name
            'slug'     				=> 'tz-plazart', // The plugin slug (typically the folder name)
            'source'   				=> get_stylesheet_directory() . '/plugins/tz-plazart.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> 'Vafpress Post Formats UI', // The plugin name
            'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
            'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      => 'OptionTree',
            'slug'      => 'option-tree',
            'required'  => true,
        ),
        array(
            'name'      => 'Max Mega Menu',
            'slug'      => 'megamenu',
            'required'  => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $tz_plazarttheme_config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $tz_plazarttheme_plugins, $tz_plazarttheme_config );

}
?>


<?php
/*  Theme Scripts    */
add_action('init', 'tz_plazarttheme_register_theme_scripts');
function tz_plazarttheme_register_theme_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php') {

        if (is_admin()) {
            add_action('admin_enqueue_scripts', 'tz_plazarttheme_register_back_end_scripts');
        }else{
            add_action('wp_enqueue_scripts', 'tz_plazarttheme_register_front_end_styles');
            add_action('wp_enqueue_scripts', 'tz_plazarttheme_register_front_end_scripts');
        }
    }
}

//Register Back-End script
function tz_plazarttheme_register_back_end_scripts(){



    wp_enqueue_style('plazarttheme-admin-styles', get_template_directory_uri() . '/extension/assets/css/admin-styles.css');
    wp_enqueue_style('plazarttheme-option', get_template_directory_uri() . '/extension/assets/css/tz-theme-options.css');


    wp_register_script('plazarttheme-portfolio-meta-boxes', get_template_directory_uri() . '/extension/assets/js/portfolio-meta-boxes.js', array(), false, $in_footer=true );
    wp_enqueue_script('plazarttheme-portfolio-meta-boxes');

    wp_register_script('plazarttheme-portfolio-theme-option', get_template_directory_uri() . '/extension/assets/js/portfolio-theme-option.js', array(), false, $in_footer=true );
    wp_enqueue_script('plazarttheme-portfolio-theme-option');
}

//Register Front-End Styles
function tz_plazarttheme_register_front_end_styles()
{
    wp_enqueue_style('bootstrap.min', get_template_directory_uri().'/css/bootstrap.min.css', false );
//    wp_enqueue_style( 'plazarttheme-open-sans', tz_plazarttheme_slug_fonts_url('Open Sans','300,400,600,700,400italic'), array(), null );
    wp_enqueue_style('isotope', get_template_directory_uri().'/css/isotope.css', false );
    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() ){
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css', false );
    }
    wp_enqueue_style('plazarttheme-style', get_template_directory_uri() . '/style.css', false );
    wp_enqueue_style('plazarttheme-custom_options_css', get_template_directory_uri().'/css/custom/custom_options_css.css', false );

    /*   Fonts-option   */
        /*  Font-body   */
    $tz_plazarttheme_body_font_type       =    ot_get_option('plazarttheme_TZFontType');
    $tz_plazarttheme_body_font_family     =    ot_get_option('plazarttheme_TzFontFaminy');
    $tz_plazarttheme_body_font_weight     =    ot_get_option('plazarttheme_TzFontFami');
    $tz_plazarttheme_body_font_selecter       =   ot_get_option('plazarttheme_TzBodySelecter');
    if( $tz_plazarttheme_body_font_type == 'Tzgoogle' && $tz_plazarttheme_body_font_family != 'Default' && $tz_plazarttheme_body_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$tz_plazarttheme_body_font_family, tz_plazarttheme_slug_fonts_url($tz_plazarttheme_body_font_family,$tz_plazarttheme_body_font_weight), array(), null );
    }

        /*  Font-head   */
    $tz_plazarttheme_head_font_type       =    ot_get_option('plazarttheme_TZFontTypeHead');
    $tz_plazarttheme_head_font_family     =    ot_get_option('plazarttheme_TzFontFaminyHead');
    $tz_plazarttheme_head_font_weight     =    ot_get_option('plazarttheme_TzFontHeadGoodurl');
    $tz_plazarttheme_head_font_selecter   =   ot_get_option('plazarttheme_TzHeadSelecter');
    if( $tz_plazarttheme_head_font_type == 'Tzgoogle' && $tz_plazarttheme_head_font_family != 'Default' && $tz_plazarttheme_head_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$tz_plazarttheme_head_font_family, tz_plazarttheme_slug_fonts_url($tz_plazarttheme_head_font_family,$tz_plazarttheme_head_font_weight), array(), null );
    }

        /*  Font-menu   */
    $tz_plazarttheme_menu_font_type       =    ot_get_option('plazarttheme_TZFontTypeMenu');
    $tz_plazarttheme_menu_font_family     =    ot_get_option('plazarttheme_TzFontFaminyMenu');
    $tz_plazarttheme_menu_font_weight     =    ot_get_option('plazarttheme_TzFontMenuGoodurl');
    $tz_plazarttheme_menu_font_selecter   =   ot_get_option('plazarttheme_TzMenuSelecter');
    if( $tz_plazarttheme_menu_font_type == 'Tzgoogle' && $tz_plazarttheme_menu_font_family != 'Default' && $tz_plazarttheme_menu_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$tz_plazarttheme_menu_font_family, tz_plazarttheme_slug_fonts_url($tz_plazarttheme_menu_font_family,$tz_plazarttheme_menu_font_weight), array(), null );
    }

        /*  Font-custom   */
    $tz_plazarttheme_custom_font_type     =    ot_get_option('plazarttheme_TZFontTypeCustom');
    $tz_plazarttheme_custom_font_family   =    ot_get_option('plazarttheme_TzFontFaminyCustom');
    $tz_plazarttheme_custom_font_weight   =    ot_get_option('plazarttheme_TzFontCustomGoodurl');
    $tz_plazarttheme_custom_font_selecter  =   ot_get_option('plazarttheme_TzCustomSelecter');
    if( $tz_plazarttheme_custom_font_type == 'Tzgoogle' && $tz_plazarttheme_custom_font_family != 'Default' && $tz_plazarttheme_custom_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$tz_plazarttheme_custom_font_family, tz_plazarttheme_slug_fonts_url($tz_plazarttheme_custom_font_family,$tz_plazarttheme_custom_font_weight), array(), null );
    }

    /*   End-Fonts-option   */

    /*   Themecolor-option   */
    $tz_plazarttheme_color_type     =    ot_get_option('plazarttheme_TZTypecolor');
    $tz_plazarttheme_themecolor     =    ot_get_option('plazarttheme_TZThemecolor');
    if( $tz_plazarttheme_color_type == '0' && $tz_plazarttheme_themecolor != 'themecolor' ){
        wp_enqueue_style('plazarttheme-themecolor', get_template_directory_uri() . '/css/themecolor/'.$tz_plazarttheme_themecolor.'.css', false);
    }
}

//Register Front-End Scripts
function tz_plazarttheme_register_front_end_scripts()
{

    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, $in_footer=true );

    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() ){
        wp_deregister_script('jsflexslider');
        wp_register_script('jsflexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array(), false,$in_footer=true);
        wp_enqueue_script('jsflexslider');

        wp_deregister_script('plazarttheme-single');
        wp_register_script('plazarttheme-single', get_template_directory_uri().'/js/single.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-single');
    }

    wp_enqueue_script( 'plazarttheme-custom', get_template_directory_uri().'/js/custom.js', array('jquery'), false, $in_footer=true );



    if ( is_page_template('template-portfolio.php') ):

        global $post;
        $tz_plazarttheme_desktop            =  get_post_meta( $post -> ID, 'plazarttheme_desktop_column', true );
        $tz_plazarttheme_tabletportrait     =  get_post_meta( $post -> ID, 'plazarttheme_tabletportrait_column', true );
        $tz_plazarttheme_mobilelandscape    =  get_post_meta( $post -> ID, 'plazarttheme_mobilelandscape_column', true );
        $tz_plazarttheme_mobileportrait     =  get_post_meta( $post -> ID, 'plazarttheme_mobileportrait_column', true );
        $tz_plazarttheme_filter_status      =  get_post_meta( $post -> ID, 'plazarttheme_porfolio_filter_status', true ) ;
        $tz_plazarttheme_paging             =  get_post_meta( $post -> ID, 'plazarttheme_paging', true ) ;
        $tz_plazarttheme_image              =  get_post_meta( $post -> ID, 'plazarttheme_porfolio_loadding', true) ;
        if ( isset ( $tz_plazarttheme_image ) && $tz_plazarttheme_image == '' ):
            $tz_plazarttheme_image =  get_template_directory_uri().'/images/ajax-loader.gif' ;
        endif;

        wp_deregister_script('plazarttheme-jsisotope');
        wp_register_script('plazarttheme-jsisotope', get_template_directory_uri().'/js/jquery.isotope.min.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-jsisotope');

        if ( $tz_plazarttheme_paging != 'pagenavi' ) :
            wp_deregister_script('plazarttheme-infinitescroll');
            wp_register_script('plazarttheme-infinitescroll', get_template_directory_uri().'/js/jquery.infinitescroll.min.min.js', array(), false,$in_footer=true);
            wp_enqueue_script('plazarttheme-infinitescroll');
        endif;

        wp_deregister_script('plazarttheme-resize');
        wp_register_script('plazarttheme-resize', get_template_directory_uri().'/js/resize.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-resize');

        wp_deregister_script('plazarttheme-portfolio');
        wp_register_script('plazarttheme-portfolio', get_template_directory_uri().'/js/portfolio.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-portfolio');

        $tz_plazarttheme_variables_portfolio = array(
            'desktop'         =>    $tz_plazarttheme_desktop,
            'tabletportrait'  =>    $tz_plazarttheme_tabletportrait,
            'mobilelandscape' =>    $tz_plazarttheme_mobilelandscape,
            'mobileportrait'  =>    $tz_plazarttheme_mobileportrait,
            'filter_status'   =>    $tz_plazarttheme_filter_status,
            'paging'          =>    $tz_plazarttheme_paging,
            'image'           =>    $tz_plazarttheme_image
        );
        wp_localize_script( 'portfolio', 'variables_portfolio', $tz_plazarttheme_variables_portfolio ) ;

    endif;

}


/**
 * Function for retrieving and saving fonts from Google
 *
 *
 * @uses get_transient()
 * @uses set_transient()
 * @uses wp_remote_get()
 * @uses wp_remote_retrieve_body()
 * @uses json_decode()
 * @return JSON object with font data
 *
 */
function tz_plazarttheme_get_fonts() {
    $fonts = get_transient("tz_plazarttheme_google_fonts");

    if (false === $fonts)	{

        $request = wp_remote_get("https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCjae0lAeI-4JLvCgxJExjurC4whgoOigA");

        if(is_wp_error($request)) {

            $error_message = $request->get_error_message();

            echo "Something went wrong: ".esc_html($error_message)."";

        } else {


            $json = wp_remote_retrieve_body($request);

            $data = json_decode($json, TRUE);

            $items = $data["items"];

            $i = 0;

            foreach ($items as $item) {

                $i++;

                $variants = array();
                foreach ($item['variants'] as $variant) {
                    if(!stripos($variant, "italic") && $variant != "italic") {
                        if($variant == "regular") {
                            $variants[] = "normal";
                        } else {
                            $variants[] = $variant;
                        }
                    }
                }

                $fonts[] = array("uid" => $i, "family" => $item["family"], "variants" => $variants);

            }

            set_transient("tz_plazarttheme_google_fonts", $fonts, 60 * 60 * 24);

        }

    }

    return $fonts;
}

?>
