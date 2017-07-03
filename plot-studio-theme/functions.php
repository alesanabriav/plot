<?php
add_theme_support( 'post-thumbnails' );

//SHORTCODES
require_once 'shortcodes/portafolio.php';

//LIBS
require_once 'lib/post_types.php';
require_once 'lib/react_render.php';
require_once 'lib/update_meta_field.php';
require_once 'lib/clean_menu.php';
require_once 'lib/menus.php';

//METABOXES
require_once 'metaboxes/video.php';
