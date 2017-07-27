<?php get_header() ?>

<div class="container">
  <?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
      <h1 style="font-size: 30px; text-align: center;display: block"><?php the_title() ?><a href="/directors"> <i class="ion-ios-close-empty"></i></a></h1>
			<?php the_content() ?>
		<?php  endwhile; ?>
  <?php else : ?>
    <h1> <?php echo '404 nea' ?> </h1>
  <?php endif; ?>
</div>

<?php get_footer() ?>
