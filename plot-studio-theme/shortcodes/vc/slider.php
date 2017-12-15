<?php

function slider_vc() {

	$subparams = [
		[
			"type" => "textfield",
			"heading" => "Title",
			"param_name" => "title"
		],
		[
			"type" => "attach_image",
			"heading" => "Image",
			"param_name" => "image"
		],
		[
			"type" => "textfield",
			"heading" => "Link",
			"param_name" => "link"
		],
	];

	$params = [
    [
      "type" => "textfield",
      "heading" => "enter interval",
      "param_name" => "interval",
      "value" => 5000
    ],
    [
      'type' => 'param_group',
      'value' => '',
      'param_name' => 'slide',
      'params' => $subparams
    ]
	];

  vc_map(
    array(
      "name" =>  "Slider",
      "base" => "ps_slider",
      "category" =>  "Plot",
      "params" => $params
    )
  );
};

add_action( 'vc_before_init', 'slider_vc' );