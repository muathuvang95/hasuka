<?php
/*
 các hàm xử lý hook được khai báo ở file hooks.php
 */

function hasuka_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	$GLOBALS['content_width'] = 800;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top-menu'    => 'Menu đầu',
		'bottom-menu' => 'Menu cuối',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 160,
		'height'      => 53,
		'flex-width'  => true,
		'flex-height'  => true,
	) );


}

function hasuka_scripts() {
	
	wp_enqueue_style( 'bootstrap', LIB_URL . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'owl-carousel', LIB_URL . '/owl-carousel/dist/assets/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-carousel-theme', LIB_URL . '/owl-carousel/dist/assets/owl.theme.default.min.css' );

	wp_enqueue_style( 'hasuka-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', LIB_URL . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', LIB_URL . '/owl-carousel/dist/owl.carousel.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'hasuka', THEME_URL . '/js/script.js', array('jquery'), '', true );
}

function hasuka_widget_sidebars() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'description'   => __( 'Thanh bên.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer-1',
		'description'   => __( 'Footer colum 1.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer-2',
		'description'   => __( 'Footer colum 2.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer-3',
		'description'   => __( 'Footer colum 3.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 4',
		'id'            => 'footer-4',
		'description'   => __( 'Footer colum 4.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 5',
		'id'            => 'footer-5',
		'description'   => __( 'Footer colum 5.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer info left',
		'id'            => 'footer-left',
		'description'   => __( 'Thêm widget vào bên trái footer.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer info right',
		'id'            => 'footer-right',
		'description'   => __( 'Thêm widget vào bên phải footer.' ),
		'before_widget' => '<section id="%1$s" class="widget widget-homepage %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}