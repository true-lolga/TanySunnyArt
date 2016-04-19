<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Splendor
 */

if ( ! is_active_sidebar( 'left-sidebar' ) && ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="inverse" role="complementary">
	<div class="content-wrapper flexed">
		<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
			<div class="left widget-area">
				<?php dynamic_sidebar( 'left-sidebar' ); ?>
			</div><!-- .left.widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			<div class="right widget-area">
				<?php dynamic_sidebar( 'right-sidebar' ); ?>
			</div><!-- .right.widget-area -->
		<?php endif; ?>
	</div><!-- .content-wrapper -->
</div><!-- #secondary -->
