<?php

add_action( 'init', 'create_post_type' );

function create_post_type() {

  register_post_type( 'portfolio',
    [
      'labels' => [
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio'
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category'],
      'public' => true,
      'has_archive' => false
		]
  );

  register_post_type( 'director',
    [
      'labels' => [
        'name' => 'Directors',
        'singular_name' => 'Director'
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category' ],
      'public' => true,
      'has_archive' => false
		]
  );

}
