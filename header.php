<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package E-State_Billing
 */
$url = get_template_directory_uri() . '/';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url . 'css/open-iconic-bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/animate.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/owl.carousel.min.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/owl.theme.default.min.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/magnific-popup.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/aos.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/ionicons.min.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/flaticon.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/icomoon.css';?>">
    <link rel="stylesheet" href="<?php echo $url . 'css/style.css';?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  	<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
			<?php 
                    $cntct = get_field('contact_sec', 'option');
                    $f_nbr = $cntct['first_naumber'];
                    $sec_nbr = $cntct['second_number'];
                    $email = $cntct['email'];
                    ?>
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text"><?php echo $sec_nbr; ?></span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						   <a href="mailto:<?php echo $email; ?>" class="text-white"> <span class="text"><?php echo $email; ?></span></a>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
		<?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        ?>
	      <a class="navbar-brand" href="<?php echo home_url(); ?>">
		  <img src="<?php echo $image['0'];?>" alt="" srcset="">
		</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
			<?php 
// Define the menu name
$menu_name = 'main-menu'; // Change this to your actual menu name

// Get the menu object by name
$menu = wp_get_nav_menu_object($menu_name);
if ($menu) {
    // Get the menu items
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    // Get the current page URL
    $current_url = home_url($_SERVER['REQUEST_URI']);

    // Output the menu items
    foreach ($menu_items as $menu_item) {
		$class = $menu_item->classes['0'];
		?>
	   <li class="<?php echo $class . ' nav-item'; ?>"><a href="<?php echo $menu_item->url; ?>" class="nav-link"><span><?php echo $menu_item->title; ?></span></a></li>
        <?php 
			}
		} else {
			echo 'Menu not found.';
		}
		
		?>
	        </ul>
	      </div>
	    </div>
	  </nav>