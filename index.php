<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package E-State_Billing
 */

get_header();
$url = get_template_directory_uri() . '/';
?>
<?php 
$banner = get_field('banner','option');
$img = $banner['bg-image'];
$bn_h1 = $banner['intro-h2'];
$bn_h2 = $banner['intro-h1'];
$bn_txt = $banner['banner_text'];
$bn_btn = $banner['banner_button'];
// echo "<pre>";
// print_r($banner);
// echo "</pre>";
?>
<section class="hero-wrap js-fullheight" style="background-image: url('<?php echo $img['url'];?>');" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 pt-5 ftco-animate">
          	<div class="mt-5">
          		<span class="subheading"><?php echo $bn_h1;?></span>
	            <h1 class="mb-4"><?php echo $bn_h2;?></h1>
	            <div class="mb-4 text-dark"><?php echo $bn_txt;?></div>
            </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    	<div class="container">
    		<div class="row d-flex">
			<?php 
							$about = get_field('about-rep','option');
							$ab_img = $about['about-img'];
							$ab_title = $about['about-title'];
							$ab_content = $about['content'];
							$ab_btn = $about['button_'];
							?>
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?php echo $ab_img['url']; ?>);">
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
    				<div class="py-md-5">
	    				<div class="row justify-content-start pb-3">
			          <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
			            <h2 class="mb-4"><?php echo $ab_title; ?></h2>
			            <p><?php echo $ab_content; ?></p>
			          </div>
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
			<div class="container">
        <div class="row d-flex">
	        <div class="col-md-12 py-5">
	        	<div class="py-lg-5">
		        	<div class="row justify-content-center pb-5">
			          <div class="col-md-12 heading-section ftco-animate">
			            <h2 class="mb-3">What we offer</h2>
						  <p>We offer Medical Billing Solutions & Services for a wide range of Specialties.</p>
			          </div>
			        </div>
					<div class="row g-0 service-row">
            <?php
    // Custom query to retrieve 'services' custom post type with a limit of 4 posts
    $args = array(
        'post_type' => 'services',
        'posts_per_page' => 6,
		'order' => 'ASC'
    );
    $services_query = new WP_Query($args);

    // Loop through the custom post type 'services'
    if ($services_query->have_posts()) :
        while ($services_query->have_posts()) : $services_query->the_post();
    ?>
                <div class="col-md-6 col-lg-4 p-1 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item border h-100 p-2">
                        <div class="btn-square1 mb-4 image-style">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <img class="img-fluid" src="<?php echo $image[0]; ?>" alt="Icon">
                        </div>
                       <div class="services-bottom p-1">
                       <h4 class="mb-3"><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
                       </div>
                    </div>
                </div>
                <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No services found</p>';
    endif;
    ?>
            </div>
			      </div>
		      </div>
		    </div>
			</div>
		</section>
		<?php 
$bg_img = get_field('bg_section__', 'option'); 
$bg_title_ = $bg_img['title__'];
$bg_inner_img = $bg_img['bg_image'];
$bg_cntnt_1 = $bg_img['content_'];
$bg_btn = $bg_img['bg_button'];
?>

<section class="ftco-intro img" style="background-image: url(<?php echo $bg_inner_img['url'];?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2><?php echo $bg_title_; ?></h2>
                <p><?php echo $bg_cntnt_1; ?></p>
                <p class="mb-0"><a href="<?php echo $bg_btn['url']; ?>" class="btn btn-white px-4 py-3"><?php echo $bg_btn['title']; ?></a></p>
            </div>
        </div>
    </div>
</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb" id="department-section">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
    			<div class="col-md-4 d-flex">
					<?php 
					$dept_img = get_field('department_left_img','option');
					?>
    				<div class="img img-dept align-self-stretch" style="background-image: url(<?php echo $dept_img['url'];?>);"></div>
    			</div>

    			<div class="col-md-8">
    				<div class="row no-gutters">
						<?php 
$dpt = get_field('dep-rep','option');
if($dpt):
    $count = 0; // Initialize counter
    foreach($dpt as $row):
        $dpt_title = $row['dep-title'];
        $dpt_desc = $row['dep-desc'];
        ?>
        <!-- item start -->
        <div class="col-md-4 department-wrap p-4 ftco-animate">
            <div class="text p-2 text-center">
                <div class="icon">
                    <span class="flaticon-stethoscope"></span>
                </div>
                <h3><a href="#"><?php echo $dpt_title; ?></a></h3>
                <p><?php echo $dpt_desc; ?></p>
            </div>
        </div>
        <!-- item end -->
        <?php 
        $count++; // Increment counter
        if ($count >= 6) break; // Exit loop if counter reaches 5
    endforeach; 
endif; ?>
                    </div>
                    <?php 
                    if(count($dpt) > 6): ?>
    <div class="text-center m-3">
        <a href="<?php echo home_url('/specialties/');?>" class="btn btn-primary">Load More</a>
    </div>
<?php endif; ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
		<section class="ftco-facts img ftco-counter" style="background-image: url(<?php echo $url . 'images/bg_3.jpg';?>);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-flex align-items-center">
					<?php 
					$counter_txt = get_field('counter_left_col','option');
                    $SB_HEding = $counter_txt['subheading']; 
					$mn_HEding = $counter_txt['main_heading']; 
					$btn = $counter_txt['button']; 
					?>
					<div class="col-md-5 heading-section heading-section-white">
						<span class="subheading"><?php echo $SB_HEding; ?></span>
						<h2 class="mb-4"><?php echo $mn_HEding; ?></h2>
					</div>
					<div class="col-md-7">
						<div class="row pt-4">
							<?php 
							$cnter = get_field('count-rep','option');
						   if($cnter):
							foreach($cnter as $row):
								$title = $row['count-title'];
								$nmbr = $row['count-num'];
							?>
		         <!-- item start -->
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $nmbr; ?>">0</strong>
		                <span><?php echo $title; ?></span>
		              </div>
		            </div>
		          </div>
				     <!-- item end -->
					 <?php endforeach; ?>
					 <?php endif; ?>
	          </div>
					</div>
				</div>
			</div>
		</section>
		<?php get_template_part('template-parts/blog');?>
	<?php //get_template_part('template-parts/testimonial');?>
	<?php get_template_part('template-parts/quote');?>
<?php get_footer();?>
