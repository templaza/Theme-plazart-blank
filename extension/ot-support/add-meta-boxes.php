<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', 'tz_plazarttheme_custom_meta_boxes');

/*
 * Methor add meta boxes for custom post type
 */
function tz_plazarttheme_custom_meta_boxes(){

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */



    $tz_plazarttheme_portfolio_meta_box =   array(
        'id'          =>  'portfolio_meta_box',
        'title'       =>  esc_html__('Portfolio Option', 'tz-plazarttheme'),
        'desc'        =>  '',
        'pages'       => array( 'portfolio'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     =>  esc_html__('Post Type', 'tz-plazarttheme'),
                'id'        =>  'plazarttheme_portfolio_type',
                'type'      =>  'select',
                'desc'      =>  esc_html__('Option type Post', 'tz-plazarttheme'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' => esc_html__('None', 'tz-plazarttheme')
                    ),
                    array(
                        'value' => 'video',
                        'label' => esc_html__('Video', 'tz-plazarttheme')
                    ),
                    array(
                        'value' => 'audio',
                        'label' => esc_html__('Audio', 'tz-plazarttheme')
                    ),
                    array(
                        'value' => 'quote',
                        'label' => esc_html__('Quote', 'tz-plazarttheme')
                    ),
                    array(
                        'value' => 'image',
                        'label' => esc_html__('Image', 'tz-plazarttheme')
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' => esc_html__('Slideshows', 'tz-plazarttheme')
                    )
                ),

            ),

            array(
                'label'     => esc_html__('Slideshow', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'plazarttheme_portfolio_slideshow_item',
                        'label'     => esc_html__('Image', 'tz-plazarttheme'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(
                'label'     => esc_html__('Image', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_image',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'label'     => esc_html__('SoundCloud ID', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      => esc_html__('Only use for the SoundCloud', 'tz-plazarttheme'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),

            array(
                'label'     => esc_html__('Quote Content', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_Quote_content',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Quote Description', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_Quote_ds',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),

            array(
                'label'     => esc_html__('Video MP4', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_video_mp4',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Video OGV', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_video_ogv',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Video WEBM', 'tz-plazarttheme'),
                'id'        => 'plazarttheme_portfolio_video_webm',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
        )
    );

    $tz_plazarttheme_pageportfolio_meta_box =   array(
        'id'          =>  'page_meta_box',
        'title'       =>  esc_html__('Portfolio Option', 'tz-plazarttheme'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id' =>  'plazarttheme_portfolio_column',
                'label'     => esc_html__('Config Portfolio Column', 'tz-plazarttheme'),
                'desc'      => '------------------',
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'plazarttheme_desktop_column',
                'label'     => esc_html__('Desktop column', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '4',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    )
                )
            ),
            array(
                'id'        =>  'plazarttheme_tabletportrait_column',
                'label'     =>  esc_html__('tablet portrait column', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_mobilelandscape_column',
                'label'     =>  esc_html__('mobile landscape column', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_mobileportrait_column',
                'label'     =>  esc_html__('mobile portrait column', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),

            array(
                'id'        => 'plazarttheme_portfolio_catid',
                'label'     => esc_html__('Category', 'tz-plazarttheme'),
                'desc'      => esc_html__('Choose category portfolio', 'tz-plazarttheme'),
                'std'       => '',
                'type'      => 'taxonomy-checkbox',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => 'portfolio-category',
                'class'     => ''
            ),
            array(
                'id'        => 'plazarttheme_portfolio_limit',
                'label'     => esc_html__('Limit portfolio', 'tz-plazarttheme'),
                'desc'      => '',
                'std'       => '10',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_orderby',
                'label'     => esc_html__('Orderby', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'date',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>  esc_html__('Date', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>  esc_html__('Title', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>  esc_html__('ID', 'tz-plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_order',
                'label'     =>  esc_html__('Order', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'desc',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>  esc_html__('Z ---> A', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>  esc_html__('A ---> Z', 'tz-plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_paging',
                'label'     =>  esc_html__('Paging', 'tz-plazarttheme'),
                'desc'      =>  esc_html__('choose type paging', 'tz-plazarttheme'),
                'sdt'       =>  'ajaxscroll',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'pagenavi',
                        'label' =>  esc_html__('Default ( 1, 2, 3 ... 8, 9 , 10)', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'ajaxbutton',
                        'label' =>  esc_html__('Ajaxbutton', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'ajaxscroll',
                        'label' =>  esc_html__('Ajax scroll', 'tz-plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_filter_status',
                'label'     =>  esc_html__('Filter Status', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'show',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>  esc_html__('Show', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>  esc_html__('Hide', 'tz-plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_filter',
                'label'     =>  esc_html__('Filter Porfolio', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'portfolio-tags',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'portfolio-tags',
                        'label' =>  esc_html__('Portfolio tags', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  'portfolio-category',
                        'label' =>  esc_html__('Portfolio category', 'tz-plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_loadding',
                'label'     => esc_html__('Image loadding', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'upload',
                'class'     =>  '',
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_sidebar',
                'label'     =>  esc_html__('Sidebar Option', 'tz-plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'no',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>   esc_html__('Show', 'tz-plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>   esc_html__('Hide', 'tz-plazarttheme'),
                    ),
                )
            ),
        ) // end fields
    );






    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    ot_register_meta_box( $tz_plazarttheme_portfolio_meta_box );


    ot_register_meta_box( $tz_plazarttheme_pageportfolio_meta_box );



}
?>