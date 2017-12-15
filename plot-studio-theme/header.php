<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PLOT STUDIO - <?php the_title() ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700|PT+Sans+Narrow" rel="stylesheet">
	  <!-- Add the slick-theme.css if you want default styling -->
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/client/dist/index.css">
	<?php wp_head() ?>
</head>
<body>

<header>
	<div class="container">
		<div class="logo-container">
			<a href="/">
				<img src="http://localhost:8080/wp-content/uploads/2017/07/plot-logo.png" alt="" class="logo">
			</a>
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
	</div>
</header>
