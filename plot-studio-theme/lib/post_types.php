<?php

add_action( 'init', 'create_post_type' );

function create_post_type() {

  register_post_type( 'portfolio',
    [
      'labels' => [
        'name' => 'portfolio',
        'singular_name' => 'portfolio'
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category'],
      'public' => true,
      'has_archive' => true
		]
  );
}
