<?php
/**
 * Mosaic of Words functions and definitions.
 */

if (!defined('MOW_VERSION')) {
    define('MOW_VERSION', '1.2');
}

/**
 * Enqueue styles.
 */
function mow_enqueue_assets()
{
    wp_enqueue_style('mow-style', get_stylesheet_uri(), [], MOW_VERSION);
}
add_action('wp_enqueue_scripts', 'mow_enqueue_assets');

/**
 * Theme supports and menus.
 */
function mow_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'mosaic-of-words'),
    ]);
}
add_action('after_setup_theme', 'mow_theme_setup');

/**
 * Register widget areas.
 */
function mow_widgets_init()
{
    register_sidebar([
        'name'          => __('Primary Sidebar', 'mosaic-of-words'),
        'id'            => 'primary-sidebar',
        'description'   => __('Add widgets here to appear in the sidebar.', 'mosaic-of-words'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'mow_widgets_init');
