/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function( $ ) {
	var button = $( '.menu-toggle' );
	var menu = $( '.main-navigation ul' );
	var links = menu.find( 'a' );
	var subMenus = menu.find( 'ul' );
	
	console.log( menu );
	console.log( menu.length );
	function toggleFocus() {
		$( this ).parentsUntil( menu, 'li' ).toggleClass( 'focus' );
	}
	
	if ( ! menu.length ) {
		button.css( 'display', 'none' );
		return;
	}

	menu.attr( 'aria-expanded', 'false' );
	button.on( 'click', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'active' );
		
		if ( 'false' === menu.attr( 'aria-expanded' ) ) {
			menu.attr( 'aria-expanded', 'true' );
			button.attr( 'aria-expanded', 'true' );
		} else {
			menu.attr( 'aria-expanded', 'false' );
			button.attr( 'aria-expanded', 'false' );
		}
	} );

	subMenus.each( function() {
		$( this ).parent().attr( 'aria-haspopup', 'true' );
	} );
	
	links.each( function() {
		$( this ).on( 'focus blur', toggleFocus );
	} );
} )( jQuery );
