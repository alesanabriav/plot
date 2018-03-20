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

	<style>
		.slick-prev {
			z-index: 1;
			left: 4%;
		}

		.slick-next {
			z-index: 1;
			right: 4%;
		}

		.slick-prev:before, .slick-next:before {
			display: none;
		}

		@media (min-width: 1024px) {
			.slick-prev:before, .slick-next:before {
				display: block;
				color: #ffea00;
				font-size: 40px;
				opacity: 1;
			}
		}
	</style>

	<?php

	return ob_get_clean();
}

add_shortcode( 'ps_slider', 'ps_slider_sc' );