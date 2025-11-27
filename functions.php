<?php
/**
 * Theme functions for Mosaic of Words.
 */

// Enqueue styles.
function mow_enqueue_assets() {
    wp_enqueue_style( 'mow-style', get_stylesheet_uri(), [], wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'mow_enqueue_assets' );

// Theme setup: menus and thumbnails.
function mow_theme_setup() {
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        [
            'primary' => __( 'Primary Menu', 'mow' ),
            'footer'  => __( 'Footer Menu', 'mow' ),
        ]
    );
}
add_action( 'after_setup_theme', 'mow_theme_setup' );

// Register Poetry custom post type.
function mow_register_poetry_cpt() {
    $labels = [
        'name'               => __( 'Poetry', 'mow' ),
        'singular_name'      => __( 'Poem', 'mow' ),
        'menu_name'          => __( 'Poetry', 'mow' ),
        'name_admin_bar'     => __( 'Poetry', 'mow' ),
        'add_new'            => __( 'Add New', 'mow' ),
        'add_new_item'       => __( 'Add New Poem', 'mow' ),
        'new_item'           => __( 'New Poem', 'mow' ),
        'edit_item'          => __( 'Edit Poem', 'mow' ),
        'view_item'          => __( 'View Poem', 'mow' ),
        'all_items'          => __( 'All Poetry', 'mow' ),
        'search_items'       => __( 'Search Poetry', 'mow' ),
        'not_found'          => __( 'No poems found.', 'mow' ),
        'not_found_in_trash' => __( 'No poems found in Trash.', 'mow' ),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => [ 'slug' => 'poetry' ],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-book',
        'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ],
        'show_in_rest'       => true,
    ];

    register_post_type( 'poetry', $args );
}
add_action( 'init', 'mow_register_poetry_cpt' );
