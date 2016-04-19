<?php
/**
 * Template part for displaying multiple posts on a page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Splendor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header popout-link">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<?php echo splendor_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'featured-image' ); ?>
			</a>
		</div>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_excerpt(); ?>
		
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
