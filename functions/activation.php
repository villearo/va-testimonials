<?php

function va_testimonials_setup_post_type() {

	$args = array(
	'labels' => array(
		'name' => __('Testimonials'),
		'singular_name' => __('Testimonial'),
		'all_items' => __('All Testimonials'),
		'add_new_item' => __('Add New Testimonial'),
		'edit_item' => __('Edit Testimonial'),
		'view_item' => __('View Testimonial')
	),
	'public' => false,
	'publicly_queryable' => false,
	'has_archive' => false,
	'rewrite' => array('slug' => 'testimonials'),
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'show_in_admin_bar' => true,
	'capability_type' => 'page',
	'supports' => array('title', 'editor', 'thumbnail'),
	'exclude_from_search' => true,
	'menu_position' => 20,
	'has_archive' => false,
	'menu_icon' => 'dashicons-format-quote'
	);
	
	// https://codex.wordpress.org/Function_Reference/register_post_type
	register_post_type('va-testimonials', $args);

}
add_action( 'init', 'va_testimonials_setup_post_type' );





function va_testimonials_install() {

    // trigger our function that registers the custom post type
    va_testimonials_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();

}
register_activation_hook( __FILE__, 'va_testimonials_install' );
