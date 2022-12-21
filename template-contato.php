<?php /* Template Name: [Template] Contato */ get_header(); ?>

<section class="contacts">
  <div class="col-12 bg-green form-1">
    <div class="container">
      <div class="tx">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="22" title="Queremos ouvir você"]') ?>
    </div>
  </div>
</section>

<?php

get_footer();
