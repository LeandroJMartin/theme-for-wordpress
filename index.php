<?php /* Template Name: [Template] Home */ get_header();

get_template_part( 'template-parts/banner-home' );

    ?>

    <section>
      <div class="row blocks">
        <div class="col-g6 no-pad block-lines">
          <?php get_template_part( 'template-parts/slide-lines' ); ?>
        </div>
        <div class="col-g6 no-pad bg-green">
          <div class="box">
            <a href="<?php echo get_site_url(); ?>/a-gelius">
              <img src="<?php the_field('conteudo_sobre_h_imagem'); ?>" alt="Linha Quarto" />
            </a>
            <div class="tx">
                <a href="<?php echo get_site_url(); ?>/a-gelius">
                  <h1 class="title"><?php the_field('conteudo_sobre_h_titulo'); ?></h1>
                </a>
                <p><?php the_field('conteudo_sobre_h_descricao'); ?></p>
                <a href="<?php echo get_site_url(); ?>/a-gelius" class="bt bt-default">Saiba mais</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="catalog bg-color-black">
        <div class="container">
          <div class="wrap">
            <div class="tx">
              <h2><?php the_field('catalogo_titulo_bloco_catalogo'); ?></h2>
              <a class="bt bt-default" href="<?php the_field('link_do_catalogo'); ?>" target="_blank">Veja!</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php

get_footer();
