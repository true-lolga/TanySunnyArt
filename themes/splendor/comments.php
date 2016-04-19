<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Splendor
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	
	<?php if ( have_comments() ) : ?>
	
		<header class="header comment-header hgroup-overlay">
			<div class="hgroup">
				<h2 class="title"><?php esc_html_e( 'Reader Comments', 'splendor' ); ?></h2>
				<?php the_title( '<p class="subtitle">', '</p>' ); ?>
			</div>
			<div class="count inverse">
				<span><?php echo number_format_i18n( get_comments_number() ); ?></span>
			</div>
		</header>
		
		<div class="content-wrapper">
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'splendor' ); ?></h2>
					<div class="nav-links">
						
						<?php if ( get_previous_comments_link() ) : ?>
							<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'splendor' ) ); ?></div>
						<?php endif; ?>
						
						<?php if ( get_next_comments_link() ) : ?>
							<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'splendor' ) ); ?></div>
						<?php endif; ?>
				
					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>
			
			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'avatar_size' => 96,
					'short_ping'  => true,
				) );
				?>
			</ol><!-- .comment-list -->
		
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'splendor' ); ?></h2>
					<div class="nav-links">
			
						<?php if ( get_previous_comments_link() ) : ?>
							<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'splendor' ) ); ?></div>
						<?php endif; ?>
						
						<?php if ( get_next_comments_link() ) : ?>
							<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'splendor' ) ); ?></div>
						<?php endif; ?>
			
					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
			<?php endif; // Check for comment navigation. ?>
		
		</div><!-- .content-wrapper -->
		
	<?php endif; // Check for have_comments(). ?>
	
	<div class="content-wrapper">
		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'splendor' ); ?></p>
		<?php endif; ?>
		
		<?php comment_form(); ?>
	</div><!-- .content-wrapper -->
</div><!-- #comments -->
