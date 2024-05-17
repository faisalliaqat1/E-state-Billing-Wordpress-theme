<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Smart_Security
 */

get_header();

?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();?>
		<?php get_template_part('template-parts/banner-inner-archive');?>
		<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-12 col-lg-12 pl-lg-5 py-md-5">
    				<div class="py-md-1">
	    				<div class="row justify-content-start p-3">
			          <div class="col-md-12 heading-section ftco-animate fadeInUp ftco-animated p-0">
			            <h2 class="mb-4"><?php the_title(); ?></h2>
			            <div class="post_content"><?php the_content();?></div>
			          </div>
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
    <?php get_template_part('template-parts/testimonial');?>
    <?php get_template_part('template-parts/quote');?>
   
    
      <?php 
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
