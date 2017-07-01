<?php

function ps_portafolio_sc( $atts ) {
	$at = shortcode_atts([], $atts);
	$props = ['name' => 'aleli'];
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