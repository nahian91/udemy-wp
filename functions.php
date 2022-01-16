<?php

function project_setup(){

    load_theme_textdomain('project', get_template_directory() . '/languages');

    register_nav_menus(array(
        'primary' => __('Main Menu', 'project')
    ));

    add_theme_support('post-thumbnails', array('slider'));

}
add_action('after_setup_theme', 'project_setup');


function project_assets() {

    wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'theme', get_stylesheet_uri() );

    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/assets/js/imageloaded.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'main', get_template_directory_uri('jquery') . '/assets/js/main.js', array(), '1.0.0', true );

}
add_action('wp_enqueue_scripts', 'project_assets');


// Theme Options with ACF


function project_acf() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings', 'project'),
            'menu_title'  => __('Theme Settings', 'project'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Header Settings', 'project'),
            'menu_title'  => __('Header', 'project'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('About Settings', 'project'),
            'menu_title'  => __('About', 'project'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Faq Skills Settings', 'project'),
            'menu_title'  => __('Faq Skills', 'project'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Services Settings', 'project'),
            'menu_title'  => __('Services', 'project'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}
add_action('acf/init', 'project_acf');


function cpt_init() {
    $labels = array(
        'name'                  => _x( 'Sliders', 'Post type general name', 'recipe' ),
        'singular_name'         => _x( 'Slider', 'Post type singular name', 'recipe' ),
        'menu_name'             => _x( 'Sliders', 'Admin Menu text', 'recipe' ),
        'name_admin_bar'        => _x( 'Slider', 'Add New on Toolbar', 'recipe' ),
        'add_new'               => __( 'Add New', 'recipe' ),
        'add_new_item'          => __( 'Add New slider', 'recipe' ),
        'new_item'              => __( 'New slider', 'recipe' ),
        'edit_item'             => __( 'Edit slider', 'recipe' ),
        'view_item'             => __( 'View slider', 'recipe' ),
        'all_items'             => __( 'All sliders', 'recipe' ),
        'search_items'          => __( 'Search slider', 'recipe' ),
        'parent_item_colon'     => __( 'Parent sliders:', 'recipe' ),
        'not_found'             => __( 'No sliders found.', 'recipe' ),
        'not_found_in_trash'    => __( 'No sliders found in Trash.', 'recipe' ),
        'featured_image'        => _x( 'Slider Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'recipe' ),
        'set_featured_image'    => _x( 'Set slider image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'recipe' )
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Slider custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'custom-fields', 'thumbnail' ),
        'show_in_rest'       => false
    );
      
    register_post_type( 'slider', $args );
}
add_action( 'init', 'cpt_init' );