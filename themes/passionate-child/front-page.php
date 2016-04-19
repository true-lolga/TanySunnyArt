<?php
/**
 * Template Name: Front Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passionate
 */

get_header(); ?>



<section class="home-page">
	<div class="site-content">
		
			
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .container -->
</section><!-- .home-page -->

<section class="my-work">
    <?php while ( have_posts() ) : the_post(); 
        $artworks_link = get_field("artworks_link");
       
     

    ?>
                <div id="artworks">
                        <?php echo ( $artworks_link ) ?>
            	        
                </div>
    <?php endwhile; // end of the loop. ?>
</section>
 

<section class="main-insta">
    <div class="site-content">
        <?php echo wdi_feed(array('id'=>'1')); ?>
    

    </div>
</section>


<section class="main-contacts">
    <div class="site-content">
        <?php while ( have_posts() ) : the_post(); 
              $phone = get_field("phone");
              $email = get_field("email");
              $adress = get_field("adress");
              $social = get_field("social");
              $map = get_field("map");

		?>

            <article class="contacts">

                <h2><a href="<?php echo home_url(); ?>/contacts">Мои Контакты</a></h2>

                <ul class="contacts">
                    <li>
		                <p><?php echo $phone; ?></p><br>
		                <p><?php echo $email; ?></p><br>
		                <p><?php echo $adress; ?></p><br>
		                <p><?php echo $social; ?></p>
		            </li>

		            <li id="map">
		                <?php echo $map; ?>
		            </li>

	        </article>


		<?php endwhile; // end of the loop. ?>

    </div>
</section>

<?php get_footer(); ?>
