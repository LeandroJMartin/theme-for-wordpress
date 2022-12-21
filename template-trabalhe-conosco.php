<?php /* Template Name: [Template] Trabalhe Conosco */ get_header(); ?>
<section class="contacts">
  <div class="col-12 form-2">
    <div class="container">
      <div class="tx">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="24" title="Trabalhe conosco"]') ?>
    </div>
  </div>
</section>

<?php

get_footer();
