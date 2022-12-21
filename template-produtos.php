<?php /* Template Name: [Template] Produtos */

get_header();

get_template_part( 'template-parts/lines' );

$url = $_SERVER["REQUEST_URI"];
$cat = explode('/', $url);

$filterCat = array_filter($cat);

if(count($filterCat) >= 3 && !in_array("produtos", $filterCat)) :

    if(in_array("categoria", $filterCat) || in_array("page", $filterCat)) :

        if (in_array("page", $filterCat)) :

            $position = array_search("page", $filterCat);
            $sub = $position - 1;

            $category = $filterCat[$sub];

        else :

            $category = (count($filterCat) >= 3) ? end($filterCat) : 'all';

        endif;

    endif;

else :

    $category = 'all';

endif;

?>

<section class="container">
    <div class="row">
        <aside id="filter" class="filter">
            <?php

                $args = array('category' => $category);
                get_template_part( 'template-parts/filter', '', $args );

            ?>
        </aside>
        <div class="products">

            <?php

                $args = array('paginate' => false, 'data-url' => $filterCat);
                get_template_part( 'template-parts/navigation', '', $args );

            ?>

            <div id="grid" class="grid">
                <?php

                  if(get_query_var( 'paged' )){
                    $paged = get_query_var( 'paged' );
                  }else if(get_query_var( 'page' )){
                    $paged = get_query_var( 'page' );
                  }else{
                    $paged = 1;
                  }

                  if( $category != 'all') {
                    $tax_query = array(
                        'relation'   => 'OR',
                        array(
                          'taxonomy' => 'category',
                          'terms'    => array( $category),
                          'field'    => 'slug',
                        ),
                      );
                  }else{
                    $tax_query = [];
                  }

                  $args = array(
                    'post_type'      => 'produto',
                    'posts_per_page' => 9,
                    'meta_key'			 => 'lancamento',
                  	'orderby'			   => 'meta_value',
                  	'order'				   => 'DESC',
                    'tax_query'      => $tax_query,
                    'paged'          => $paged,
                  );

                  $wp_query = new WP_Query( $args );

                  if ($wp_query->have_posts()) :

                      while ($wp_query->have_posts()) :
                          $wp_query->the_post();

                          $exclusivo = get_field('produto_exclusivo');

                          if ( !$exclusivo ) :

                            ?>

                            <div class="product">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="img">
                                        <?php the_post_thumbnail( 'large', array( 'class' => 'fit' ) ); ?>
                                    </div>
                                    <h2 class="h1"><?php the_title(); ?></h2>
                                </a>
                                <?php

                                    if ( get_field('lancamento', get_the_ID()) ) :
                                        echo '<span>Lançamento</span>';
                                    endif;

                                ?>
                            </div>

                            <?php

                          endif;

                      endwhile;

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

                  wp_reset_postdata();

                ?>
            </div>

            <?php

                $args = array('paginate' => true, 'data-url' => false);
                get_template_part( 'template-parts/navigation', '', $args );

            ?>

        </div>
    </div>
</section>

<?php

get_footer();
