/* global templateDir */
/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.home #masthead .title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.home #masthead .subtitle' ).text( to );
		} );
	} );
	// Switch stylesheets based on selected color scheme
	wp.customize( 'color_scheme', function( value ) {
		value.bind( function( to ) {
			var head = $( 'head' );
			var switcher = $( '#splendor-color-scheme-css', head );
			var style = templateDir + to.toString().toLowerCase() + '.css';
			switcher.attr( 'href', style );
		} );
	} );
} )( jQuery );
