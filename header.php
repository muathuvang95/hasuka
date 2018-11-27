<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	<script src="<?php echo THEME_URL; ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body

 <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header class="site-header">
		<div class="container">
			<?php
			the_custom_logo();

			wp_nav_menu( array( 'theme_location' => 'top-menu' ) );
			?>
		</div>
	</header>
	<?php
	if((is_home() || is_front_page()) && is_page_template('homepage.php')) { // home page
		$slider = fw_get_db_settings_option('slider');
		if(function_exists('masterslider')) {
			masterslider($slider);
		}
	} else {
		hasuka_breadcrumb();
	}
	?>
	<div id="main">