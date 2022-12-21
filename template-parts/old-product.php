<?php

    $notid = ($args['notid'] != '') ? $args['notid'] : '';

    if ($args['category'] === 'all') {
        $cat = '';
    }else{
        $cat = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => array( $args['category'] ),
        );
    }

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $wp_query = new WP_Query(array(
      'post_type' => 'produto',
      'posts_per_page' => $args['numpage'],
      'post__not_in' => array( $notid ),
      'tax_query' => array(
          'relation' => 'AND',
          $cat,
      ),
      'order' => 'DESC',
      'paged' => $paged,
    ));

    if ( $wp_query->have_posts() ) :

        while( $wp_query->have_posts() ) : $wp_query->the_post();

            $lancamento = get_field('lancamento');

            ?>

            <div class="product">
                <a href="<?php the_permalink(); ?>">
                    <div class="img">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'fit' ) ); ?>
                    </div>
                    <h2 class="h1"><?php the_title(); ?></h2>
                </a>
                <?php

                    if ($lancamento) {
                        echo '<span>Lançamento</span>';
                    }

                ?>
            </div>

            <?php

        endwhile;
        wp_reset_postdata();

    else :

        ?>
        <div class="product">
            <div class="anything">
                <h3>Ops...</h3>
                <p>Nenhum produto encontrado</p>
            </div>
        </div>
        <?php

    endif;

    ?>
