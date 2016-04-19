<?php
/**
 * Template part for displaying single posts.
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
			'before' => sprintf( '<div class="page-links">%s',
				esc_html__( 'Pages', 'splendor' )
			),
			'after'  => '</div>',
			'pagelink' => '<span class="page-number">%</span>'
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer popout-link">
		<?php splendor_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

