<?php
/**
 * Splendor Theme Customizer.
 *
 * @package Splendor
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function splendor_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'color_scheme' )->transport     = 'postMessage';
}
add_action( 'customize_register', 'splendor_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function splendor_customize_preview_js() {
	wp_enqueue_script( 'splendor-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
	wp_localize_script( 'splendor-customizer', 'templateDir', get_template_directory_uri() . '/css/colors/' );
}
add_action( 'customize_preview_init', 'splendor_customize_preview_js' );
