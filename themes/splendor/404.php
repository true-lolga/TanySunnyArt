<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Splendor
 */

get_header(); ?>

	<main id="primary" class="site-main content-area" role="main">
		<div class="content-wrapper">

			<section class="error-404 not-found">
			
				<p><?php printf( wp_kses( __( 'It looks like nothing was found at this location. Try <a href="%1$s">returning home</a> or performing a search.', 'splendor' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( home_url( '/' ) ) )
					?></p>
				
				<?php get_search_form(); ?>

			</section><!-- .error-404 -->

		</div><!-- .content-wrapper -->
	</main><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
