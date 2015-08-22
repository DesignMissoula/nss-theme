<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'init', 'register_cpt_sally' );

function register_cpt_sally() {

	 $labels = array( 
        'name' => _x( 'Age', 'age' ),
        'singular_name' => _x( 'Age', 'age' ),
        'search_items' => _x( 'Search Age', 'age' ),
        'popular_items' => _x( 'Popular Age', 'age' ),
        'all_items' => _x( 'All Age', 'age' ),
        'parent_item' => _x( 'Parent Age', 'age' ),
        'parent_item_colon' => _x( 'Parent Age:', 'age' ),
        'edit_item' => _x( 'Edit Age', 'age' ),
        'update_item' => _x( 'Update Age', 'age' ),
        'add_new_item' => _x( 'Add New Age', 'age' ),
        'new_item_name' => _x( 'New Age', 'age' ),
        'separate_items_with_commas' => _x( 'Separate age with commas', 'age' ),
        'add_or_remove_items' => _x( 'Add or remove age', 'age' ),
        'choose_from_most_used' => _x( 'Choose from the most used age', 'age' ),
        'menu_name' => _x( 'Age', 'age' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'age', array('sally'), $args );

    $labels = array( 
        'name' => _x( 'Sallys', 'sally' ),
        'singular_name' => _x( 'Sally', 'sally' ),
        'add_new' => _x( 'Add New', 'sally' ),
        'add_new_item' => _x( 'Add New Sally', 'sally' ),
        'edit_item' => _x( 'Edit Sally', 'sally' ),
        'new_item' => _x( 'New Sally', 'sally' ),
        'view_item' => _x( 'View Sally', 'sally' ),
        'search_items' => _x( 'Search Sallys', 'sally' ),
        'not_found' => _x( 'No sallys found', 'sally' ),
        'not_found_in_trash' => _x( 'No sallys found in Trash', 'sally' ),
        'parent_item_colon' => _x( 'Parent Sally:', 'sally' ),
        'menu_name' => _x( 'Sallys', 'sally' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'taxonomies' => array( 'age' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        'menu_icon' => 'dashicons-sos',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'sally', $args );
}

