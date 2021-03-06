<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Splendor
 */

get_header(); ?>

	<main id="primary" class="site-main content-area" role="main">
		<div class="content-wrapper">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php
			the_posts_pagination( array(
				'prev_text'          => sprintf( '<span class="screen-reader-text">%s</span>', 
					esc_html__( 'Previous page', 'splendor' )
				),
				'next_text'          => sprintf( '<span class="screen-reader-text">%s</span>',
					esc_html__( 'Next Page', 'splendor' )
				),
				'before_page_number' => sprintf( '<span class="meta-nav screen-reader-text">%s</span>',
					esc_html__( 'Page', 'splendor' )
				)
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- .content-wrapper -->
	</main><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
