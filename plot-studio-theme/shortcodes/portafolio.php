<?php

function ps_portafolio_sc( $atts ) {
	$at = shortcode_atts([], $atts);
	$query = new Wp_Query(array(
    'post_type' => 'portfolio',
		'posts_per_page' => -1,
		'post_status' => 'publish'
  ));

	$items = array_map(function($item) {
		$attachment_id = get_post_thumbnail_id($item->ID);
		$item->post_thumbnail = wp_get_attachment_image_src($attachment_id, 'thumbnail')[0];
		$item->post_image = wp_get_attachment_image_src($attachment_id, 'full')[0];
		$item->post_categories = get_the_category($item->ID);
		$item->post_video_thumb = get_post_meta($item->ID, 'video_thumb_key', true);
		$item->client_name = get_post_meta($item->ID, 'client_name_key', true);
		return $item;
	}, $query->get_posts());

	$props = ['items' => $items];
	$component = react_render( 'Portafolio', $props  );

	ob_start();
?>

	<!--ps_portafolio-->
	<div data-props='<?php echo json_encode($props) ?>' class='ps-portafolio'>
		<?php echo $component ?>
	</div>
	<!--/ps_portafolio-->

<?php
	return ob_get_clean();
}

add_shortcode( 'ps_portafolio', 'ps_portafolio_sc' );
