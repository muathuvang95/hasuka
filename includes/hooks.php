<?php
/*
 Khai báo các hook
 */

add_action( 'after_setup_theme', 'hasuka_setup' );

add_action( 'wp_enqueue_scripts', 'hasuka_scripts' );

add_action( 'widgets_init', 'hasuka_widget_sidebars' );