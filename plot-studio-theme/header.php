<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PLOT STUDIO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<?php wp_head() ?>
	<style>
		body {
			background: #000;
			color: #fff;
		}

	.blur-up {
		-webkit-filter: blur(5px);
		filter: blur(5px);
		transition: filter 400ms, -webkit-filter 400ms;
	}

	.blur-up.lazyloaded {
		-webkit-filter: blur(0);
		filter: blur(0);
	}

	.lazyload,
	.lazyloading {
		opacity: 0;
		transition: opacity 400ms;
	}

	lazyloaded {
		opacity: 1;
	}

	.grid-item {
		min-height: 300px;
	}

	.portfolio-item__container {
		position: relative;
	}

	.portfolio-item__media {
		position: relative;
		background-color: rgba(0, 0, 0, 0.5);
	}

	.portfolio-item__media img {
		position: relative;
		top: 0;
		left: 0;
		z-index: 2
	}

	.portfolio-item__media video {
		position: absolute;
		top: 0;
		left: 0;
		z-index: 1;
		width: 100%;
	}

	.portfolio-item__texts h2{
		font-size: 16px
	}

	.portfolio-item__texts h1{
		font-size: 18px
	}

	.portfolio-item {
		padding-left: 1px;
		padding-right: 1px;
		cursor: pointer;
	}

	footer {
		width: 100%;
		height: 80px;
		border-top: 1px solid yellow;
		position: fixed;
		bottom: 0;
	}

	.footer__social {
		float: right;
		padding-top: 15px;
	}

	.footer__social li {
		float: left;
		list-style: none;
		margin: 0 10px;
	}

	.footer__social li a {
		color: yellow;
		font-size: 30px;
	}
	</style>
</head>
<body>

<header>
	<div class="logo-container">
		<img src="" alt="" class="logo">
	</div>

	<ul>
		<?php
			$args = array(
        'theme_location' => 'header',
        'container' => false,
        'echo' => false
		);

			$menu = wp_nav_menu( $args);
    	echo clean_menu($menu);
    ?>
	</ul>
</header>
