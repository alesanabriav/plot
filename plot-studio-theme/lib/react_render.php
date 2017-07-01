<?php

function react_render( $componentName = '', $props = [] ) {
	$clientFolder = str_replace('lib', 'client', __DIR__);
	$v8 = new V8Js();
	$propsJson = json_encode($props);
	$react = file_get_contents($clientFolder.'/node_modules/react/dist/react.js');
	$reactDOM = file_get_contents($clientFolder.'/node_modules/react-dom/dist/react-dom-server.js');
	$bundle =  file_get_contents($clientFolder.'/dist/bundle.js');
	$component = 'ReactDOMServer.renderToString(React.createElement( '. $componentName .', ' . $propsJson . '))';

	$jsFiles = [ $react, $reactDOM, $bundle, $component ];

	try {
		return $v8->executeString(implode( PHP_EOL, $jsFiles ));
	} catch (Exception $e) {
		echo '<h2>', $e->getMessage(), '</h2>';
		echo '<pre>', $e->getTraceAsString(), '</pre>';
		exit;
	}
	
}
