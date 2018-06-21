<?php
function horseclub_run() {
  register_nav_menus(array(
    'primary_navigation' => esc_html__('Primary Navigation', 'horseclub'),
     'mobile_navigation' => esc_html__('Mobile Navigation', 'horseclub'),   
  ));  
  add_image_size( 'horseclub-thumb', 80, 50, true );
  add_post_type_support( 'attachment', 'page-attributes' );
  set_post_thumbnail_size(200, 200);
  add_theme_support('post-thumbnails');
  add_theme_support( 'automatic-feed-links' );
  add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action('after_setup_theme', 'horseclub_run');
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}

