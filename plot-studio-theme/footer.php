<footer>
  <div class="container">
    <div class="footer__info">
      <?php dynamic_sidebar( 'footer' ); ?>
    </div>
    <ul class="footer__social">
      <li><a href="https://vimeo.com/plotstudio" target="_blank"><i class="ion-social-vimeo"></i></a></li>
      <li><a href="#"><i class="ion-social-facebook"></i></a></li>
      <li><a href="#"><i class="ion-social-instagram"></i></a></li>
    </ul>
  </div>
</footer>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/client/dist/vendor.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/client/dist/app.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/app.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0/lazysizes.min.js"></script>
<?php wp_footer() ?>
</body>
</html>
