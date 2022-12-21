<div class="banner">
  <div id="slide" class="owl-carousel owl-theme">
    <?php

      $wp_query = new WP_Query(array(
        'post_type' => 'banner_home',
        'posts_per_page' => -1
      ));

      while( $wp_query->have_posts() ) : $wp_query->the_post();

        $img_desk = get_field('imagem_desktop');
        $img_mobi = get_field('imagem_mobile');
        $link     = get_field('link_do_banner');
        $target   = get_field('abrir_em_uma_nova_aba');

        $targ =  ($target == 'sim') ? '_blank' : '_self';

        ?>
        <div class="item">
          <?php echo ($link) ? '<a href="' . $link . '" target="' . $targ . '">' : '';

              if($img_desk) :

                ?>

                <img class="desk" src="<?php echo $img_desk; ?>" alt="<?php the_title(); ?>" />

                <?php

              endif;

              if($img_mobi) :

                ?>

                <img class="mobi" src="<?php echo $img_mobi; ?>" alt="<?php the_title(); ?>" />

                <?php

              endif;

            echo ($link) ? '</a>' : '' ;

          ?>
        </div>
        <?php

       endwhile;
       wp_reset_query();

    ?>
  </div>
</div>
