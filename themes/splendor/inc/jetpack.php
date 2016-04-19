<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Splendor
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function splendor_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'splendor_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function splendor_jetpack_setup
add_action( 'after_setup_theme', 'splendor_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function splendor_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function splendor_infinite_scroll_render
