<?php

function ps_slider_sc( $atts ){
	$at = shortcode_atts([
	 'slide' => ''
	], $atts);

	$slides = array_map(function($slide){
		$slide['image'] = wp_get_attachment_url($slide['image']);
		return $slide;
	}, vc_param_group_parse_atts($at['slide']));

	$props = [
		'slides' => $slides
	];

	ob_start();
	?>
	<section class="slider-container" data-props='<?php echo wp_json_encode($props) ?>'></section>

	<?php

	return ob_get_clean();
}

add_shortcode( 'ps_slider', 'ps_slider_sc' );