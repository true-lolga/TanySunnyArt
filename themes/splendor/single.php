<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Splendor
 */

get_header(); ?>

	<main id="primary" class="site-main content-area" role="main">
		<div class="content-wrapper">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'template-parts/content', 'single' ); ?>
			
				<?php
				the_post_navigation( array(
					'next_text' => sprintf( '<span class="meta-nav" aria-hidden="true">%1$s</span><span class="screen-reader-text">%2$s</span><span class="post-title">%%title</span>',
						esc_html__( 'Next', 'splendor' ),
						esc_html__( 'Next Post', 'splendor' )
					),
					'prev_text' => sprintf( '<span class="meta-nav" aria-hidden="true">%1$s</span><span class="screen-reader-text">%2$s</span><span class="post-title">%%title</span>',
						esc_html__( 'Previous', 'splendor' ),
						esc_html__( 'Previous Post', 'splendor' )
					),
				) );
				?>
				
			<?php endwhile; // End of the loop ?>
			
		</div><!-- .content-wrapper -->
	</main>
			
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
