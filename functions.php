<?php

/*
 *constants
 */

define('THEME_PREFIX', 'plazarttheme');
define('THEME_NAME', 'plazarttheme');
define('TEXT_DOMAIN', 'plazarttheme');
define('THEME_VERSION', '1.0');
define('get_template_directory_uri()', get_template_directory_uri());
define('SERVER_PATH', get_template_directory());
define( 'CSS_PATH', get_template_directory_uri().'/css/' );
define( 'JS_PATH', get_template_directory_uri().'/js/');
define( 'IMG_PATH', get_template_directory_uri().'/images/');
define( 'FONT_PATH', get_template_directory_uri().'/fonts/');


function plazarttheme_setup(){
    /**
     * Text domain
     */
    load_theme_textdomain('plazarttheme', get_template_directory() . '/languages');


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
add_action( 'after_setup_theme', 'plazarttheme_setup' );


/*  (tz-demo)    */
function plazarttheme_add_editor_styles() {
    add_editor_style();
}
add_action( 'admin_init', 'plazarttheme_add_editor_styles' );



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
function plazarttheme_theme_prefix_addto_header() {
    ?>
    <script type="text/javascript">
        var themeprefix = '<?php echo esc_js('plazarttheme') ?>';
    </script>
<?php
}
add_action('admin_head', 'plazarttheme_theme_prefix_addto_header');
add_action('wp_head', 'plazarttheme_theme_prefix_addto_header');


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 900;


/**
 * Show full editor
 */
function plazarttheme_ilc_mce_buttons($buttons){
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
add_filter("mce_buttons_2", "plazarttheme_ilc_mce_buttons");

/*
 * Adds JavaScript to pages with the comment form to support
 * sites with threaded comments (when in use).
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );




if ( ! function_exists( 'plazarttheme_paging_nav' ) ) {
    function plazarttheme_paging_nav() {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }

        $plazarttheme_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $plazarttheme_pagenum_link = html_entity_decode( get_pagenum_link() );
        $plazarttheme_query_args   = array();
        $plazarttheme_url_parts    = explode( '?', $plazarttheme_pagenum_link );

        if ( isset( $plazarttheme_url_parts[1] ) ) {
            wp_parse_str( $plazarttheme_url_parts[1], $plazarttheme_query_args );
        }

        $plazarttheme_pagenum_link = remove_query_arg( array_keys( $plazarttheme_query_args ), $plazarttheme_pagenum_link );
        $plazarttheme_pagenum_link = trailingslashit( $plazarttheme_pagenum_link ) . '%_%';

        $plazarttheme_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $plazarttheme_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $plazarttheme_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $plazarttheme_links = paginate_links( array(
            'base'     => $plazarttheme_pagenum_link,
            'format'   => $plazarttheme_format,
            'total'    => $wp_query->max_num_pages,
            'current'  => $plazarttheme_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $plazarttheme_query_args ),
            'prev_text' => esc_html__( 'Previous', 'plazarttheme' ),
            'next_text' => esc_html__( 'Next', 'plazarttheme' ),
        ) );

        if ( $plazarttheme_links ) :

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo $plazarttheme_links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
        <?php
        endif;
    }
}



if ( ! function_exists( 'plazarttheme_custom_paging_nav' ) ) {
    function plazarttheme_custom_paging_nav($plazarttheme_query_total) {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $plazarttheme_query_total < 2 ) {
            return;
        }

        $plazarttheme_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $plazarttheme_pagenum_link = html_entity_decode( get_pagenum_link() );
        $plazarttheme_query_args   = array();
        $plazarttheme_url_parts    = explode( '?', $plazarttheme_pagenum_link );

        if ( isset( $plazarttheme_url_parts[1] ) ) {
            wp_parse_str( $plazarttheme_url_parts[1], $plazarttheme_query_args );
        }

        $plazarttheme_pagenum_link = remove_query_arg( array_keys( $plazarttheme_query_args ), $plazarttheme_pagenum_link );
        $plazarttheme_pagenum_link = trailingslashit( $plazarttheme_pagenum_link ) . '%_%';

        $plazarttheme_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $plazarttheme_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $plazarttheme_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $plazarttheme_links = paginate_links( array(
            'base'     => $plazarttheme_pagenum_link,
            'format'   => $plazarttheme_format,
            'total'    => $plazarttheme_query_total,
            'current'  => $plazarttheme_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $plazarttheme_query_args ),
            'prev_text' => esc_html__( 'Previous', 'plazarttheme' ),
            'next_text' => esc_html__( 'Next', 'plazarttheme' ),
        ) );

        if ( $plazarttheme_links ) :

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo $plazarttheme_links; ?>
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
        function ot_get_option( $plazarttheme_option_id, $plazarttheme_default = '' ) {
            /* get the saved options */
            $plazarttheme_options = get_option( 'option_tree' );
            /* look for the saved value */
            if ( isset( $plazarttheme_options[$plazarttheme_option_id] ) && '' != $plazarttheme_options[$plazarttheme_option_id] ) {
                return $plazarttheme_options[$plazarttheme_option_id];
            }
            return $plazarttheme_default;
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
if ( ! function_exists( 'plazarttheme_slug_fonts_url' ) ) {
    function plazarttheme_slug_fonts_url($plazarttheme_name,$plazarttheme_fontweight) {
        $plazarttheme_fonts_url = '';

        if ( 'off' !== _x( 'on', $plazarttheme_name.' font: on or off', 'plazarttheme' ) ) {
            $plazarttheme_font_families = array();
            $plazarttheme_font_families[] = $plazarttheme_name.':'.$plazarttheme_fontweight;

            $plazarttheme_query_args = array(
                'family' => urlencode( implode( '|', $plazarttheme_font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $plazarttheme_fonts_url = add_query_arg( $plazarttheme_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $plazarttheme_fonts_url );
    }
}


/*   Creat File Css   */
if ( ! function_exists( 'plazarttheme_CustomCss' ) ) {
    function plazarttheme_CustomCss($data='', $prefix='css') {
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
                return esc_html__('Failed to create css file', 'plazarttheme');
            }

            if(!$wp_filesystem->put_contents( $filepart_css, $data, 0644) ) {
                return esc_html__('Failed to create css file', 'plazarttheme');
            }
        }
    }
}

/*  Post Type   */
function plazarttheme_vafpress_setup() {
    add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','quote' ) );
}
add_action( 'after_setup_theme', 'plazarttheme_vafpress_setup' );

/*method activie plugin*/
require_once dirname( __FILE__ ) . '/plugins/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'plazarttheme_register_required_plugins' );
function plazarttheme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plazarttheme_plugins = array(

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
    $plazarttheme_config = array(
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

    tgmpa( $plazarttheme_plugins, $plazarttheme_config );

}
?>


<?php
/*  Theme Scripts    */
add_action('init', 'plazarttheme_register_theme_scripts');
function plazarttheme_register_theme_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php') {

        if (is_admin()) {
            add_action('admin_enqueue_scripts', 'plazarttheme_register_back_end_scripts');
        }else{
            add_action('wp_enqueue_scripts', 'plazarttheme_register_front_end_styles');
            add_action('wp_enqueue_scripts', 'plazarttheme_register_front_end_scripts');
        }
    }
}

//Register Back-End script
function plazarttheme_register_back_end_scripts(){



    wp_enqueue_style('plazarttheme-admin-styles', get_template_directory_uri() . '/extension/assets/css/admin-styles.css');
    wp_enqueue_style('plazarttheme-option', get_template_directory_uri() . '/extension/assets/css/tz-theme-options.css');


    wp_register_script('plazarttheme-portfolio-meta-boxes', get_template_directory_uri() . '/extension/assets/js/portfolio-meta-boxes.js', array(), false, $in_footer=true );
    wp_enqueue_script('plazarttheme-portfolio-meta-boxes');

    wp_register_script('plazarttheme-portfolio-theme-option', get_template_directory_uri() . '/extension/assets/js/portfolio-theme-option.js', array(), false, $in_footer=true );
    wp_enqueue_script('plazarttheme-portfolio-theme-option');
}

//Register Front-End Styles
function plazarttheme_register_front_end_styles()
{
    wp_enqueue_style('bootstrap.min', get_template_directory_uri().'/css/bootstrap.min.css', false );
//    wp_enqueue_style( 'plazarttheme-open-sans', plazarttheme_slug_fonts_url('Open Sans','300,400,600,700,400italic'), array(), null );
    wp_enqueue_style('isotope', get_template_directory_uri().'/css/isotope.css', false );
    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() ){
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css', false );
    }
    wp_enqueue_style('plazarttheme-style', get_template_directory_uri() . '/style.css', false );
    wp_enqueue_style('plazarttheme-custom_options_css', get_template_directory_uri().'/css/custom/custom_options_css.css', false );

    /*   Fonts-option   */
        /*  Font-body   */
    $plazarttheme_body_font_type       =    ot_get_option('plazarttheme_TZFontType');
    $plazarttheme_body_font_family     =    ot_get_option('plazarttheme_TzFontFaminy');
    $plazarttheme_body_font_weight     =    ot_get_option('plazarttheme_TzFontFami');
    $plazarttheme_body_font_selecter       =   ot_get_option('plazarttheme_TzBodySelecter');
    if( $plazarttheme_body_font_type == 'Tzgoogle' && $plazarttheme_body_font_family != 'Default' && $plazarttheme_body_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$plazarttheme_body_font_family, plazarttheme_slug_fonts_url($plazarttheme_body_font_family,$plazarttheme_body_font_weight), array(), null );
    }

        /*  Font-head   */
    $plazarttheme_head_font_type       =    ot_get_option('plazarttheme_TZFontTypeHead');
    $plazarttheme_head_font_family     =    ot_get_option('plazarttheme_TzFontFaminyHead');
    $plazarttheme_head_font_weight     =    ot_get_option('plazarttheme_TzFontHeadGoodurl');
    $plazarttheme_head_font_selecter   =   ot_get_option('plazarttheme_TzHeadSelecter');
    if( $plazarttheme_head_font_type == 'Tzgoogle' && $plazarttheme_head_font_family != 'Default' && $plazarttheme_head_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$plazarttheme_head_font_family, plazarttheme_slug_fonts_url($plazarttheme_head_font_family,$plazarttheme_head_font_weight), array(), null );
    }

        /*  Font-menu   */
    $plazarttheme_menu_font_type       =    ot_get_option('plazarttheme_TZFontTypeMenu');
    $plazarttheme_menu_font_family     =    ot_get_option('plazarttheme_TzFontFaminyMenu');
    $plazarttheme_menu_font_weight     =    ot_get_option('plazarttheme_TzFontMenuGoodurl');
    $plazarttheme_menu_font_selecter   =   ot_get_option('plazarttheme_TzMenuSelecter');
    if( $plazarttheme_menu_font_type == 'Tzgoogle' && $plazarttheme_menu_font_family != 'Default' && $plazarttheme_menu_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$plazarttheme_menu_font_family, plazarttheme_slug_fonts_url($plazarttheme_menu_font_family,$plazarttheme_menu_font_weight), array(), null );
    }

        /*  Font-custom   */
    $plazarttheme_custom_font_type     =    ot_get_option('plazarttheme_TZFontTypeCustom');
    $plazarttheme_custom_font_family   =    ot_get_option('plazarttheme_TzFontFaminyCustom');
    $plazarttheme_custom_font_weight   =    ot_get_option('plazarttheme_TzFontCustomGoodurl');
    $plazarttheme_custom_font_selecter  =   ot_get_option('plazarttheme_TzCustomSelecter');
    if( $plazarttheme_custom_font_type == 'Tzgoogle' && $plazarttheme_custom_font_family != 'Default' && $plazarttheme_custom_font_selecter != '' ){
        wp_enqueue_style( 'plazarttheme-'.$plazarttheme_custom_font_family, plazarttheme_slug_fonts_url($plazarttheme_custom_font_family,$plazarttheme_custom_font_weight), array(), null );
    }

    /*   End-Fonts-option   */

    /*   Themecolor-option   */
    $plazarttheme_color_type     =    ot_get_option('plazarttheme_TZTypecolor');
    $plazarttheme_themecolor     =    ot_get_option('plazarttheme_TZThemecolor');
    if( $plazarttheme_color_type == '0' && $plazarttheme_themecolor != 'themecolor' ){
        wp_enqueue_style('plazarttheme-themecolor', get_template_directory_uri() . '/css/themecolor/'.$plazarttheme_themecolor.'.css', false);
    }
}

//Register Front-End Scripts
function plazarttheme_register_front_end_scripts()
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
        $plazarttheme_desktop            =  get_post_meta( $post -> ID, 'plazarttheme_desktop_column', true );
        $plazarttheme_tabletportrait     =  get_post_meta( $post -> ID, 'plazarttheme_tabletportrait_column', true );
        $plazarttheme_mobilelandscape    =  get_post_meta( $post -> ID, 'plazarttheme_mobilelandscape_column', true );
        $plazarttheme_mobileportrait     =  get_post_meta( $post -> ID, 'plazarttheme_mobileportrait_column', true );
        $plazarttheme_filter_status      =  get_post_meta( $post -> ID, 'plazarttheme_porfolio_filter_status', true ) ;
        $plazarttheme_paging             =  get_post_meta( $post -> ID, 'plazarttheme_paging', true ) ;
        $plazarttheme_image              =  get_post_meta( $post -> ID, 'plazarttheme_porfolio_loadding', true) ;
        if ( isset ( $plazarttheme_image ) && $plazarttheme_image == '' ):
            $plazarttheme_image =  get_template_directory_uri().'/images/ajax-loader.gif' ;
        endif;

        wp_deregister_script('plazarttheme-jsisotope');
        wp_register_script('plazarttheme-jsisotope', get_template_directory_uri().'/js/jquery.isotope.min.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-jsisotope');

        if ( $plazarttheme_paging != 'pagenavi' ) :
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

        $plazarttheme_variables_portfolio = array(
            'desktop'         =>    $plazarttheme_desktop,
            'tabletportrait'  =>    $plazarttheme_tabletportrait,
            'mobilelandscape' =>    $plazarttheme_mobilelandscape,
            'mobileportrait'  =>    $plazarttheme_mobileportrait,
            'filter_status'   =>    $plazarttheme_filter_status,
            'paging'          =>    $plazarttheme_paging,
            'image'           =>    $plazarttheme_image
        );
        wp_localize_script( 'portfolio', 'variables_portfolio', $plazarttheme_variables_portfolio ) ;

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
function plazarttheme_get_fonts() {
    $fonts = get_transient("plazarttheme_google_fonts");

    if (false === $fonts)	{

        $request = wp_remote_get("https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCjae0lAeI-4JLvCgxJExjurC4whgoOigA");

        if(is_wp_error($request)) {

            $error_message = $request->get_error_message();

            echo "Something went wrong: $error_message";

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

            set_transient("plazarttheme_google_fonts", $fonts, 60 * 60 * 24);

        }

    }

    return $fonts;
}

?>
