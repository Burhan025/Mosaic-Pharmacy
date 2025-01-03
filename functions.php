<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_scripts_styles', 1000 );
function parallax_enqueue_scripts_styles() {
// Styles
wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/style.css', array() );
wp_enqueue_style( 'icomoon-fonts', get_stylesheet_directory_uri() . '/icomoon.css', array() );
wp_enqueue_style( 'gf-worksans', '//fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600&display=swap', array() );
wp_enqueue_style( 'gf-inter', '//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array() );

// Scripts
wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/scripts.js', array() );
}


/*
* Add Insights & Resources custom post type
*/
function cpt_resources() {
  $labels = array(
      'name'                  => _x( 'Resources', 'Multimedia General Name', 'ghint' ),
      'singular_name'         => _x( 'Resource', 'Multimedia Singular Name', 'ghint' ),
      'menu_name'             => __( 'Insights and Resources', 'ghint' ),
      'name_admin_bar'        => __( 'Resource', 'ghint' ),
      'archives'              => __( 'Resource Archives', 'ghint' ),
      'attributes'            => __( 'Resource Attributes', 'ghint' ),
      'parent_item_colon'     => __( 'Parent Resource:', 'ghint' ),
      'all_items'             => __( 'All Resources', 'ghint' ),
      'add_new_item'          => __( 'Add New Resource', 'ghint' ),
      'add_new'               => __( 'Add New', 'ghint' ),
      'new_item'              => __( 'New Resource', 'ghint' ),
      'edit_item'             => __( 'Edit Resource', 'ghint' ),
      'update_item'           => __( 'Update Resource', 'ghint' ),
      'view_item'             => __( 'View Resource', 'ghint' ),
      'view_items'            => __( 'View Resources', 'ghint' ),
      'search_items'          => __( 'Search Resources', 'ghint' ),
      'not_found'             => __( 'Resource Not found', 'ghint' ),
      'not_found_in_trash'    => __( 'Resource Not found in Trash', 'ghint' ),
      'featured_image'        => __( 'Featured Image', 'ghint' ),
      'set_featured_image'    => __( 'Set featured image', 'ghint' ),
      'remove_featured_image' => __( 'Remove featured image', 'ghint' ),
      'use_featured_image'    => __( 'Use as featured image', 'ghint' ),
      'insert_into_item'      => __( 'Insert into Resource', 'ghint' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'ghint' ),
      'items_list'            => __( 'Resource list', 'ghint' ),
      'items_list_navigation' => __( 'Resource list navigation', 'ghint' ),
      'filter_items_list'     => __( 'Filter Resource list', 'ghint' ),
  );
  $args = array(
      'label'                 => __( 'Resource', 'ghint' ),
      'description'           => __( 'CPT for Resources ', 'ghint' ),
      'labels'                => $labels,
      'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'author' ),
      'taxonomies'            => array('resource_format', 'resource_type'),
      'hierarchical'          => true,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 3,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => 'insights-and-resources/all',
      'rewrite'               => array( 'slug' => 'insights-and-resources/resource', 'with_front' => false ),
      'query_var'             => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
      'show_in_rest'          => true,
  );
  register_post_type('resource', $args);
}
add_action('init', 'cpt_resources', 0);

/*
* Add Type custom taxonomy to Insights & Resource custom post type
*/
function cpt_taxonomy_type() {
  $labels = array(
      'name'                       => _x( 'Type', 'Type', 'ghint' ),
      'singular_name'              => _x( 'Type', 'Type', 'ghint' ),
      'menu_name'                  => __( 'Types', 'ghint' ),
      'all_items'                  => __( 'All Types', 'ghint' ),
      'parent_item'                => __( 'Parent Type', 'ghint' ),
      'parent_item_colon'          => __( 'Parent Type:', 'ghint' ),
      'new_item_name'              => __( 'New Type', 'ghint' ),
      'add_new_item'               => __( 'Add New Type', 'ghint' ),
      'edit_item'                  => __( 'Edit Type', 'ghint' ),
      'update_item'                => __( 'Update Type', 'ghint' ),
      'view_item'                  => __( 'View Type', 'ghint' ),
      'separate_items_with_commas' => __( 'Separate sites/units with commas', 'ghint' ),
      'add_or_remove_items'        => __( 'Add or remove sites/units', 'ghint' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'ghint' ),
      'popular_items'              => __( 'Popular Types', 'ghint' ),
      'search_items'               => __( 'Search Types', 'ghint' ),
      'not_found'                  => __( 'Not Found', 'ghint' ),
      'no_terms'                   => __( 'No Types', 'ghint' ),
      'items_list'                 => __( 'Types list', 'ghint' ),
      'items_list_navigation'      => __( 'Types list navigation', 'ghint' ),
  );
  $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
      'show_in_rest'               => true,
      'has_archive'                => true,
      'exclude_from_search'        => true,
      'query_var'                  => true,
      'rewrite'                    => array( 'slug' => 'insights-and-resources/type', 'with_front' => false, 'hierarchical' => true ),
  );
  register_taxonomy('resource_type', array('resource'), $args);
}
add_action('init', 'cpt_taxonomy_type', 0);

/*
* Add Format custom taxonomy to Insights & Resource custom post type
*/
function cpt_taxonomy_format() {
  $labels = array(
      'name'                       => _x( 'Format', 'Format', 'ghint' ),
      'singular_name'              => _x( 'Format', 'Format', 'ghint' ),
      'menu_name'                  => __( 'Formats', 'ghint' ),
      'all_items'                  => __( 'All Formats', 'ghint' ),
      'parent_item'                => __( 'Parent Format', 'ghint' ),
      'parent_item_colon'          => __( 'Parent Format:', 'ghint' ),
      'new_item_name'              => __( 'New Format', 'ghint' ),
      'add_new_item'               => __( 'Add New Format', 'ghint' ),
      'edit_item'                  => __( 'Edit Format', 'ghint' ),
      'update_item'                => __( 'Update Format', 'ghint' ),
      'view_item'                  => __( 'View Format', 'ghint' ),
      'separate_items_with_commas' => __( 'Separate sites/units with commas', 'ghint' ),
      'add_or_remove_items'        => __( 'Add or remove sites/units', 'ghint' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'ghint' ),
      'popular_items'              => __( 'Popular Formats', 'ghint' ),
      'search_items'               => __( 'Search Formats', 'ghint' ),
      'not_found'                  => __( 'Not Found', 'ghint' ),
      'no_terms'                   => __( 'No Formats', 'ghint' ),
      'items_list'                 => __( 'Formats list', 'ghint' ),
      'items_list_navigation'      => __( 'Formats list navigation', 'ghint' ),
  );
  $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
      'show_in_rest'               => true,
      'has_archive'                => true,
      'exclude_from_search'        => true,
      'query_var'                  => true,
      'rewrite'                    => array( 'slug' => 'insights-and-resources/format', 'with_front' => false, 'hierarchical' => true ),
  );
  register_taxonomy('resource_format', array('resource'), $args);
}
add_action('init', 'cpt_taxonomy_format', 0);


// Removes Query Strings from scripts and styles
function remove_script_version( $src ){
    if ( strpos( $src, 'uploads/bb-plugin' ) !== false || strpos( $src, 'uploads/bb-theme' ) !== false ) {
      return $src;
    }
    else {
      $parts = explode( '?ver', $src );
      return $parts[0];
    }
  }
  add_filter( 'script_loader_src', 'remove_script_version', 15, 1 );
  add_filter( 'style_loader_src', 'remove_script_version', 15, 1 );
  
  // Add Additional Image Sizes
  add_image_size( 'news-thumb', 260, 150, true );
  add_image_size( 'news-full', 800, 300, false );
  add_image_size( 'mailchimp', 564, 9999, false );
  add_image_size( 'amp', 600, 9999, false );
  add_image_size( 'home-news', 350, 171, true );
  add_image_size( 'subpage-header', 536, 221, true );
  add_image_size( 'service-full', 473, 444, true );
  
  // Gravity Forms confirmation anchor on all forms
  add_filter( 'gform_confirmation_anchor', '__return_true' );
  
  //Sets the number of revisions for all post types
  add_filter( 'wp_revisions_to_keep', 'revisions_count', 10, 2 );
  function revisions_count( $num, $post ) {
      $num = 3;
      return $num;
  }

  
  // Enable Featured Images in RSS Feed and apply Custom image size so it doesn't generate large images in emails
  function featuredtoRSS($content) {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ){
  $content = '<div>' . get_the_post_thumbnail( $post->ID, 'mailchimp', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
  }
  return $content;
  }
   
  add_filter('the_excerpt_rss', 'featuredtoRSS');
  add_filter('the_content_feed', 'featuredtoRSS');


// Remove Form Entry After Submission
add_action( 'gform_after_submission', 'remove_form_entry' );
function remove_form_entry( $entry ) {
    GFAPI::delete_entry( $entry['id'] );
}


//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'font-awesome' ); // FontAwesome 4
    wp_enqueue_style( 'font-awesome-5' ); // FontAwesome 5

    wp_dequeue_style( 'jquery-magnificpopup' );
    wp_dequeue_script( 'jquery-magnificpopup' );

    wp_dequeue_script( 'bootstrap' );
    wp_dequeue_script( 'jquery-fitvids' );
    wp_dequeue_script( 'jquery-waypoints' );
}, 9999 );

/* Site Optimization - Removing several assets from Home page that we dont need */

// Remove Assets from HOME page only
function remove_home_assets() {
  if (is_front_page()) {
  wp_dequeue_style('yoast-seo-adminbar');
	wp_dequeue_style('font-awesome');
  }
};
add_action( 'wp_enqueue_scripts', 'remove_home_assets', 9999 );
  
  
  //Removing unused Default Wordpress Emoji Script - Performance Enhancer
  function disable_emoji_dequeue_script() {
      wp_dequeue_script( 'emoji' );
  }
  add_action( 'wp_print_scripts', 'disable_emoji_dequeue_script', 100 );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  
  // Removes Emoji Scripts 
  add_action('init', 'remheadlink');
  function remheadlink() {
      remove_action('wp_head', 'rsd_link');
      remove_action('wp_head', 'wp_generator');
      remove_action('wp_head', 'index_rel_link');
      remove_action('wp_head', 'wlwmanifest_link');
      remove_action('wp_head', 'feed_links', 2);
      remove_action('wp_head', 'feed_links_extra', 3);
      remove_action('wp_head', 'parent_post_rel_link', 10, 0);
      remove_action('wp_head', 'start_post_rel_link', 10, 0);
      remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
      remove_action('wp_head', 'wp_shortlink_header', 10, 0);
      remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  }