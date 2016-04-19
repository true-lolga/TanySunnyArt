<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Splendor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'featured-image' ); ?>
		</div>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'splendor' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		edit_post_link(
		sprintf( esc_html_x( 'Edit %s', '%s = name of current post', 'splendor' ),
		 	the_title( '<span class="screen-reader-text">"', '"</span>', false )
		  ),
		  '<span class="edit-link">',
		  '</span>'
		);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

