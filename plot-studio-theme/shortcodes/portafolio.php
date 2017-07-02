<?php

function ps_portafolio_sc( $atts ) {
	$at = shortcode_atts([], $atts);
	$query = new Wp_Query(array(
    'post_type' => 'portfolio',
		'posts_per_page' => -1,
		'post_status' => 'publish'
  ));
	
	$items = array_map(function($item) {

		$item->post_thumbnail = get_the_post_thumbnail_url($item->ID);
		$item->post_image = get_the_post_thumbnail_url($item->ID, 'full');

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