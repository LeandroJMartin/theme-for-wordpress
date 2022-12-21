
  <div class="product">
      <a href="<?php the_permalink(); ?>">
          <div class="img">
              <?php the_post_thumbnail( 'large', array( 'class' => 'fit' ) ); ?>
          </div>
          <h2 class="h1"><?php the_title(); ?></h2>
      </a>
      <?php

          if ( get_field('lancamento', get_the_ID()) ) {
              echo '<span>Lançamento</span>';
          }

      ?>
  </div>
