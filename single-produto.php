<?php /* Template Name: [Template] Single Produto */ get_header();

$id_prod = get_the_ID();

$exclusivo = get_field('produto_exclusivo');

$valor = $exclusivo ? $exclusivo : array('Não');

$url = get_site_url();

if ( isset($_GET['qr']) ) {
  $id = preg_replace("/[^0-9]/","", $_GET['qr']);

  if ( $id != $id_prod ) {

    header('Location: '. $url .'/produtos');
    exit;

  }
}else{

  foreach ($valor as $value) {
    if ( $value === 'sim' ) {
      header('Location: '. $url .'/produtos');
      exit;
    }
  }
}

?>

<section>
    <div class="container pg-product">
        <div class="row middle">
            <div class="col-p6">
                <div class="gallery">
                    <div id="gallery" class="owl-carousel">
                        <?php

                        $colors = get_field('p_cores');
                        $selected = $colors[0]['p_cor']->slug;

                        foreach ($colors as $imagens) :

                            $category = $imagens['p_cor']->slug;

                            if ( $imagens['p_cor']->slug === $selected ) :

                                foreach ($imagens['p_imagens'] as $imgs) :

                                    ?>
                                    <div class="item" data-catimg="<?php echo $category; ?>">
                                        <img src="<?php echo $imgs['url'] ?>" alt="Image">
                                    </div>
                                    <?php

                                endforeach;

                            endif;

                        endforeach;

                        ?>
                    </div>
                    <?php

                        echo '<div id="imgs_p" class="hide">';

                        foreach ($colors as $images) :

                            $categ = $images['p_cor']->slug;

                            echo '<div data-catimg="' . $categ . '">';

                            foreach ($images['p_imagens'] as $img) :

                                ?>
                                <div class="item">
                                    <img src="<?php echo $img['url'] ?>" alt="Image" />
                                </div>
                                <?php

                            endforeach;

                            echo '</div>';

                        endforeach;

                        echo '</div>';

                        echo '<div id="thumbs_imgs_p" class="hide">';

                        foreach ($colors as $images) :

                            $categ = $images['p_cor']->slug;

                            echo '<div data-cathumb="' . $categ . '">';

                            foreach ($images['p_imagens'] as $img) :

                                ?>
                                <button class="owl-thumb-item">
                                    <img src="<?php echo $img['sizes']['thumbnail'] ?>" alt="Image" />
                                </button>
                                <?php

                            endforeach;

                            echo '</div>';

                        endforeach;

                        echo '</div>';

                    ?>
                </div>
            </div>
            <div class="col-p6">
                <div class="info">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_field('p_conteudo'); ?></p>
                    <div class="options">
                        <h3>Cores disponíveis</h3>
                        <ul class="opt">
                            <?php

                                foreach ($colors as $cor) :

                                    ?>
                                    <li>
                                        <button class="
                                        <?php

                                            if ( $cor['p_cor']->slug === $selected ) :

                                                echo 'active';

                                            endif;

                                        ?>
                                        " type="button" data-category="<?php echo $cor['p_cor']->slug; ?>"><?php echo $cor['p_cor']->name; ?></button>
                                    </li>
                                    <?php

                                endforeach;

                            ?>
                        </ul>
                    </div>
                    <div class="buttons">
                        <?php

                            if(get_field('p_esquema_de_montagem')) :

                                $pdf = get_field('p_esquema_de_montagem');
                                ?>
                                <a href="<?php echo $pdf['url']; ?>" download="<?php echo $pdf['filename']; ?>">Baixar esquema de montagem</a>
                                <?php

                            endif;
                            if(get_field('p_url_do_video')) :

                                $video = get_field('p_url_do_video');

                                if (strpos($video, '?v=')) {
                                    $url = explode('?v=', $video);
                                }else{
                                    $url = explode('/', $video);
                                }

                                ?>
                                <button id="video">Vídeo do produto</button>
                                <div class="modal-video">
                                    <div class="modal">
                                        <iframe id="i_video" width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo end($url); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <button class="close"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#1c1c1e" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="bevel"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                    </div>
                                </div>
                                <?php

                            endif;

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="dice">
            <div class="row">
                <div class="col-s6 bg-color">
                    <div class="wrap">
                        <h2>Medidas</h2>
                        <ul class="row list">
                            <?php

                              $altura = get_field('p_altura');
                              $largura = get_field('p_largura');
                              $comprimento = get_field('p_comprimento');
                              $peso = get_field('p_peso');
                              $suportado = get_field('p_peso_suportado');

                              if($altura || $largura || $comprimento || $peso || $suportado) :

                              if($altura) :
                            ?>
                            <li>
                                <b>Altura</b>
                                <p><?php the_field('p_altura'); ?></p>
                            </li>
                            <?php
                                endif;
                                if($largura) :
                            ?>
                            <li>
                                <b>Comprimento</b>
                                <p><?php the_field('p_largura'); ?></p>
                            </li>
                            <?php
                                endif;
                                if($comprimento) :
                            ?>
                            <li>
                                <b>Peso</b>
                                <p><?php the_field('p_comprimento'); ?></p>
                            </li>
                            <?php
                                endif;
                                if($peso) :
                            ?>
                            <li>
                                <b>Largura</b>
                                <p><?php the_field('p_peso'); ?></p>
                            </li>
                            <?php
                                endif;
                                if($suportado) :
                            ?>
                            <li>
                                <b>Peso suportado</b>
                                <p><?php the_field('p_peso_suportado'); ?></p>
                            </li>
                            <?php
                                endif;


                              else :

                                ?>
                                <li>
                                    <p>Nenhuma medida cadastrada.</p>
                                </li>
                                <?php
                              endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-s6 bg-color-two">
                    <div class="wrap">
                        <h2>Características</h2>
                        <ul class="row list">
                          <?php

                          $bloc1 = get_field('p_bloco_1');
                          $bloc2 = get_field('p_bloco_2');

                          if ($bloc1 || $bloc2) :

                            ?>
                            <li>
                                <?php the_field('p_bloco_1'); ?>
                            </li>
                            <li>
                                <?php the_field('p_bloco_2'); ?>
                            </li>
                          <?php

                          else :

                            ?>
                            <li>
                                Nenhuma característica cadastrada.
                            </li>
                            <?php

                          endif;

                          ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relateds">
    <div class="container">
        <h2 class="title">Produtos relacionados</h2>
        <div class="grid">
            <?php

                $categories = get_the_category();
                $p_id = get_the_ID();

                foreach ($categories as $category) :

                    if ($category->parent != 0 && $category->count > 1) {

                        $cat = $category->slug;

                    } else if( $category->parent === 0 ) {

                        $cat = $category->slug;

                    }

                endforeach;


                $args = array(
                    'post_type'        => 'produto',
                    'post_status'      => array('publish'),
                    'posts_per_page'   => 4,
                    'post__not_in'     => array( $p_id ),
                    'order'            => 'DESC',
                    'orderby'          => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
                    'tax_query'        => array(
                        'relation'           => 'AND',
                        array(
                          'taxonomy'         => 'category',
                          'terms'            => array( $cat),
                          'field'            => 'slug',
                          'operator'         => 'IN',
                        ),
                      ),
                    'paged' => $paged,
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
    </div>
</section>


<?php

get_footer();
