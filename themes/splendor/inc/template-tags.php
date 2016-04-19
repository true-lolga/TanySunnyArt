<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Splendor
 */

/**
 * Returns the appropriate page title depending on the type of page being viewed
 */
function splendor_page_title() {
	global $wp_query;
	$title = '';
	$subtitle= '';
	
	if ( is_front_page() && is_home() ) {
		$title = get_bloginfo( 'name' );
		$subtitle = get_bloginfo( 'description' );
	}
	
	if ( is_singular() ) {
		$title = get_the_title();
		
		if ( ! is_page() ) {
			$subtitle = splendor_posted_on();
		}
	}
	
	if ( is_archive() ) {
		$title = get_the_archive_title();
		$subtitle = get_the_archive_description();
	}
	
	if ( is_search() ) {
		$title = sprintf( esc_html__( 'Searched for &ldquo;%s&rdquo;', 'splendor' ), get_search_query() );
		$subtitle = sprintf( esc_html( _nx( '1 Result', '%s Results', $wp_query->found_posts, 'Number of search results', 'splendor' ) ), $wp_query->found_posts );
	}
	
	if ( is_404() ) {
		$title = esc_html__( 'Oops!', 'splendor' );
	}
	
	if ( $title || $subtitle ) {
		echo sprintf( '<h1 class="title">%1$s</h1><p class="subtitle">%2$s</p>',
			$title,
			$subtitle
		);
	}
}

if ( ! function_exists( 'splendor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function splendor_posted_on() {
	global $post;
	
	if ( is_single() ) {
		$posted_on = '<span class="posted-on"><time class="entry-date published updated" datetime="%2$s">%3$s</time></span>';
	} else {
		$posted_on = '<span class="posted-on"><a href="%1$s" rel="bookmark"><time class="entry-date published updated" datetime="%2$s">%3$s</time></a></span>';
	}
	
	$posted_on = sprintf( $posted_on,
		esc_url( get_permalink() ),
		get_the_time( 'c' ),
		/* translators: this string represents a human-readable time difference */
		sprintf( esc_html_x( '%s ago', '%s = human-readable time difference', 'splendor' ),
			human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
		)
	);
	
	$byline = '<span class="byline"><span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span></span>';
	$byline = sprintf( $byline,
		esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) ) ),
		esc_html( get_the_author_meta( 'user_nicename', $post->post_author ) )
	);
	
	return $posted_on . $byline;
}
endif;

if ( ! function_exists( 'splendor_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function splendor_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'splendor' ) );
		if ( $categories_list && splendor_categorized_blog() ) {
			printf( '<span class="cat-links">%1$s</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'splendor' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">%1$s</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'splendor' ), esc_html__( '1 Comment', 'splendor' ), esc_html__( '% Comments', 'splendor' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf( esc_html_x( 'Edit %s', '%s = name of current post', 'splendor' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function splendor_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'splendor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'splendor_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so splendor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so splendor_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in splendor_categorized_blog.
 */
function splendor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'splendor_categories' );
}
add_action( 'edit_category', 'splendor_category_transient_flusher' );
add_action( 'save_post',     'splendor_category_transient_flusher' );
