<?php
add_theme_support( 'post-thumbnails' );

//SHORTCODES
require_once 'shortcodes/portafolio.php';
require_once 'shortcodes/directors.php';

//LIBS
require_once 'lib/post_types.php';
require_once 'lib/react_render.php';
require_once 'lib/update_meta_field.php';
require_once 'lib/clean_menu.php';
require_once 'lib/menus.php';

//METABOXES
require_once 'metaboxes/video.php';
require_once 'metaboxes/directors.php';

//WIDGETS
function ps_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer-info',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}

add_action( 'widgets_init', 'ps_widgets_init' );
