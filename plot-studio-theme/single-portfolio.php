<?php get_header() ?>

<div class="container portfolio">
  <?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

      <h1><?php the_title() ?></h1>
      <h2 class="color-gray"><?php echo get_post_meta($post->ID, 'client_name_key', true) ?></h2>

      <div class="col-12">
        <?php if(!empty(get_post_meta($post->ID, 'video_url_key', true))): ?>
        <div class="iframe-container iframe-container--16">
          <iframe src="<?php echo get_post_meta($post->ID, 'video_url_key', true) ?>?title=false" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
      </div>
    <?php endif; ?>

      <div class="row" style="border-bottom: 2px solid yellow; padding: 40px 0; margin: 0 0 40px 0">
        <div class="col-md-8">
          <p><?php the_content() ?></p>
        </div>
        <div class="col-md-4 portfolio__content-right">
          <?php
            $content_right_titles = get_post_meta($post->ID, 'content_right_titles_key');
            $content_right_texts = get_post_meta($post->ID, 'content_right_texts_key');
            if(count($content_right_titles[0]) > 0): foreach($content_right_titles[0] as $i => $title):
          ?>
          <h5><?php echo $title ?></h5>
          <h4><?php echo $content_right_texts[0][$i] ?></h4>
          <?php endforeach; endif; ?>
        </div>
      </div>

      <div class="row portfolio__content-bottom">
        <div class="col-md-4">
          <?php
            $content_bottom_col1 = get_post_meta($post->ID, 'content_bottom_col1_key');
           if(is_array($content_bottom_col1[0]) && count($content_bottom_col1[0]) > 0): foreach($content_bottom_col1[0] as $i => $col1): ?>
            <h4><?php echo $col1 ?></h4>
          <?php endforeach; endif; ?>
        </div>

        <div class="col-md-4">
          <?php
            $content_bottom_col2 = get_post_meta($post->ID, 'content_bottom_col2_key');
           if(is_array($content_bottom_col2[0]) && count($content_bottom_col2[0]) > 0): foreach($content_bottom_col2[0] as $i => $col2): ?>
            <h4><?php echo $col2 ?></h4>
          <?php endforeach; endif; ?>
        </div>

        <div class="col-md-4">
          <?php
            $content_bottom_col3 = get_post_meta($post->ID, 'content_bottom_col3_key');
           if(is_array($content_bottom_col3[0]) && count($content_bottom_col3[0]) > 0): foreach($content_bottom_col3[0] as $i => $col3): ?>
            <?php if($i == 0): ?>
                <h3 style="color: #fff; font-weight: bold"><?php echo $col3 ?></h3>
            <?php else: ?>
              <h4><?php echo $col3 ?></h4>
            <?php endif; ?>


          <?php endforeach; endif; ?>
        </div>
      </div>

      <?php if(is_array($stills[0])): ?>
        <h3>STILLS</h3>

    <?php
      $stills = get_post_meta($post->ID, 'stills_key');
     foreach($stills[0] as $still):
    ?>

    <div class="col-lg-4 col-md-6 col-xs-12 portfolio-item__still">
      <img src="<?php echo $still; ?>" />
    </div>
    <?php endforeach; endif; ?>

		<?php  endwhile; ?>
  <?php else : ?>
    <h1> <?php echo gett('404') ?> </h1>
  <?php endif; ?>
</div>

<?php get_footer() ?>
