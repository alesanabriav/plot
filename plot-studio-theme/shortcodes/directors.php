<?php

function ps_directors_sc( $atts ) {
	$at = shortcode_atts([], $atts);

	$query = new Wp_Query(array(
    'post_type' => 'director',
		'posts_per_page' => -1,
		'post_status' => 'publish'
  ));

	$items = array_map(function($item) {
		$attachment_id = get_post_thumbnail_id($item->ID);
		$item->post_image = wp_get_attachment_image_src($attachment_id, 'full')[0];
		$item->post_thumb = wp_get_attachment_image_src($attachment_id, 'thumbnail')[0];
		return $item;
	}, $query->get_posts());

	$props = ['items' => $items];

	ob_start();
?>

	<!--ps_director-->
	<div data-props='<?php echo json_encode($props) ?>' class='ps-directors'></div>
	<!--/ps_director-->

<?php
	return ob_get_clean();
}

add_shortcode( 'ps_directors', 'ps_directors_sc' );
