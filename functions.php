<?php
/*
 nhúng các file php chức năng
 */
/*
 các hằng về đường dẫn
 */
define('THEME_URL', get_stylesheet_directory_uri());

define('THEME_PATH', get_stylesheet_directory());

define('INC_PATH', THEME_PATH.'/includes');

define('LIB_URL', THEME_URL.'/libraries');

require_once INC_PATH.'/functions.php';
require_once INC_PATH.'/hooks.php';
require_once INC_PATH.'/hook-functions.php';
require_once INC_PATH.'/template-tags.php';
