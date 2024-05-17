<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package E-State_Billing
 */
$url = get_template_directory_uri() . '/';
?>
<?php 
$logo_txt = get_field('address','option');
$footer_bg = get_field('footer_background','option');
?>
<footer class="ftco-footer ftco-section img" style="background-image: url(<?php echo $footer_bg['url'];?>);">
    	<div class="overlay"></div>
      <div class="container-fluid px-md-5">
        <div class="row mb-5 footer-w-col">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">E State </h2>
              <p><?php echo $logo_txt; ?></p>
              <?php 
                $social = get_field('social_links','option');?>
                <?php if($social):?>
              <ul class="ftco-footer-social list-unstyled mt-5">
              <?php 
                        foreach($social as $row):
                            $name = $row['name'];
                            $socail = $row['social_url'];
                        ?>
                <li class="ftco-animate"><a href="<?php echo $socail; ?>"><span class="<?php echo 'icon-' . $name; ?>"></span></a></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </div>
          </div>
          <!-- <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Specialties</h2>
              <ul class="list-unstyled">
              <?php 
                    //$pg_lnk = get_field('quick_links_Departments','option');
                    //if($pg_lnk):
                    //foreach($pg_lnk as $row):
                        //$name = $row['page_name'];
                    ?>
                <li><a href="<?php //echo $name['url']; ?>"><span class="icon-long-arrow-right mr-2"></span></span><?php //echo $name['title']; ?></a></li>
                <?php //endforeach; ?>
                    <?php //endif; ?>
              </ul>
            </div>
          </div> -->
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
              <?php 
                    $pg_lnk = get_field('quick_links','option');
                    if($pg_lnk):
                    foreach($pg_lnk as $row):
                        $name = $row['page_name'];
                    ?>
                <li><a href="<?php echo $name['url']; ?>"><span class="icon-long-arrow-right mr-2"></span><?php echo $name['title']; ?></a></li>
                <?php endforeach; ?>
                    <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
              <?php 
                    $servc = get_field('services_rep','option');
                    if($servc):
                    foreach($servc as $row):
                    $name = $row['select_name_']->post_title;
                    $id = $row['select_name_']->ID;?>
                <li><a href="<?php echo get_permalink( $id );?>"><span class="icon-long-arrow-right mr-2"></span><?php echo $name; ?></a></li>
                <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
              <?php 
                    $cntct = get_field('contact_sec', 'option');
                    $f_nbr = $cntct['first_naumber'];
                    $sec_nbr = $cntct['second_number'];
                    $email = $cntct['email'];
                    ?>
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $f_nbr; ?></span></li>
	                <li><a href="tel:<?php echo $sec_nbr; ?>"><span class="icon icon-phone"></span><span class="text"><?php echo $sec_nbr; ?></span></a></li>
	                <li><a href="mailto:<?php echo $email; ?>"><span class="icon icon-envelope pr-4"></span><span class="text"><?php echo $email; ?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
          <?php 
    $cpright = get_field('copyright','option');
    //if(!empty($cpright)):
        $lft_txt  = $cpright['left_text'];
        //$rght_txt  = $cpright['right_text'];
    ?>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script>   <?php echo $lft_txt; ?></p>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="<?php echo $url . 'js/jquery.min.js';?>"></script>
  <script src="<?php echo $url . 'js/jquery-migrate-3.0.1.min.js';?>"></script>
  <script src="<?php echo $url . 'js/popper.min.js';?>"></script>
  <script src="<?php echo $url . 'js/bootstrap.min.js';?>"></script>
  <script src="<?php echo $url . 'js/jquery.easing.1.3.js';?>"></script>
  <script src="<?php echo $url . 'js/jquery.waypoints.min.js';?>"></script>
  <script src="<?php echo $url . 'js/jquery.stellar.min.js';?>"></script>
  <script src="<?php echo $url . 'js/owl.carousel.min.js';?>"></script>
  <script src="<?php echo $url . 'js/jquery.magnific-popup.min.js';?>"></script>
  <script src="<?php echo $url . 'js/aos.js';?>"></script>
  <script src="<?php echo $url . 'js/jquery.animateNumber.min.js';?>"></script>
  <script src="<?php echo $url . 'js/scrollax.min.js';?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo $url . 'js/google-map.js';?>"></script>
  <script src="<?php echo $url . 'js/main.js';?>"></script>
  <?php wp_footer(); ?>
  </body>
</html>
