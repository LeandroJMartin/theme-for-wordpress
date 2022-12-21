<div id="slide_lines" class="owl-carousel owl-theme">

  <?php

  $quarto = array(
      'img' => get_field('linhas_line_q_imagem'),
      'title' => get_field('linhas_line_q_titulo'),
      'descri' => get_field('linhas_line_q_descricao'),
  );

  $filter_quarto = array_filter($quarto);

  if(!empty($filter_quarto)) :

      ?>

      <div class="item bg-blue">
          <a href="<?php echo get_site_url(); ?>/categoria/quarto">
              <img src="<?php echo $quarto['img']; ?>" alt="Linha Quarto" />
          </a>
          <div class="wrap">
              <a href="<?php echo get_site_url(); ?>/categoria/quarto">
                  <h2 class="title h1"><?php echo $quarto['title']; ?></h2>
              </a>
              <p><?php echo $quarto['descri']; ?></p>
              <a href="<?php echo get_site_url(); ?>/categoria/quarto" class="bt bt-default">Veja todos</a>
          </div>
      </div>

      <?php

  endif;

  $sala = array(
      'img' => get_field('linhas_line_s_imagem'),
      'title' => get_field('linhas_line_s_titulo'),
      'descri' => get_field('linhas_line_s_descricao'),
  );

  $filter_sala = array_filter($sala);

  if(!empty($filter_sala)) :

      ?>

      <div class="item bg-green">
          <a href="<?php echo get_site_url(); ?>/categoria/sala">
              <img src="<?php echo $sala['img']; ?>" alt="Linha Sala" />
          </a>
          <div class="wrap">
              <a href="<?php echo get_site_url(); ?>/categoria/sla">
                  <h2 class="title h1"><?php echo $sala['title']; ?></h2>
              </a>
              <p><?php echo $sala['descri']; ?></p>
              <a href="<?php echo get_site_url(); ?>/categoria/sala" class="bt bt-default">Veja todos</a>
          </div>
      </div>

      <?php

  endif;

  $infantil = array(
      'img' => get_field('linhas_line_i_imagem'),
      'title' => get_field('linhas_line_i_titulo'),
      'descri' => get_field('linhas_line_i_descricao'),
  );

  $filter_infantil = array_filter($infantil);

  if(!empty($filter_infantil)) :

      ?>

      <div class="item bg-yellow">
          <a href="<?php echo get_site_url(); ?>/categoria/baby">
              <img src="<?php echo $infantil['img']; ?>" alt="Linha Baby" />
          </a>
          <div class="wrap">
              <a href="<?php echo get_site_url(); ?>/categoria/baby">
                  <h2 class="title h1"><?php echo $infantil['title']; ?></h2>
              </a>
              <p><?php echo $infantil['descri']; ?></p>
              <a href="<?php echo get_site_url(); ?>/categoria/baby" class="bt bt-default">Veja todos</a>
          </div>
      </div>

      <?php

  endif;

  $kids = array(
      'img' => get_field('linhas_line_k_imagem'),
      'title' => get_field('linhas_line_k_titulo'),
      'descri' => get_field('linhas_line_k_descricao'),
  );

  $filter_kids = array_filter($kids);

  if(!empty($filter_kids)) :

      ?>

      <div class="item bg-red">
          <a href="<?php echo get_site_url(); ?>/categoria/kids">
              <img src="<?php echo $kids['img']; ?>" alt="Linha Kids" />
          </a>
          <div class="wrap">
              <a href="<?php echo get_site_url(); ?>/categoria/kids">
                  <h2 class="title h1"><?php echo $kids['title']; ?></h2>
              </a>
              <p><?php echo $kids['descri']; ?></p>
              <a href="<?php echo get_site_url(); ?>/categoria/kids" class="bt bt-default">Veja todos</a>
          </div>
      </div>

      <?php

  endif;

  ?>

</div>
