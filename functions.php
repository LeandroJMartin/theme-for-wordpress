<?php

/**
 * Theme default by Maya Comunicação
 *
 * @link get_site_url();
 *
 * @package WordPress
 * @subpackage theme slug
 * @since 1.0
 */

update_option( 'siteurl', 'https://gelius.com.br' );
update_option( 'home', 'https://gelius.com.br' );

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

function aiwp_scripts(){

    /*-- Js --*/
    wp_enqueue_script( 'aiwp_jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), '3.5.1', true  );
    wp_enqueue_script( 'aiwp_owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '4.1.1', true  );
    wp_enqueue_script( 'aiwp_owl.carousel.thumb', get_template_directory_uri() . '/assets/js/owl.carousel2.thumbs.js', array( 'jquery' ), '2.0.0', true  );
    wp_enqueue_script( 'aiwp_fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array( 'jquery' ), '3.5.7', true  );
		wp_enqueue_script( 'aiwp_scripts', get_template_directory_uri() .'/assets/js/theme-scripts.js', array( 'jquery' ), '1.0', true  );

    /*-- Css --*/
    wp_enqueue_style( 'aiwp_reset', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'aiwp_owl.carousel.min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'aiwp_owl.carousel.theme-css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'aiwp_fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );

    wp_enqueue_style( 'aiwp_style_min', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'aiwp_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );


    /*-- Google fonts --*/
    wp_enqueue_style( 'cdv_google_font', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">' );
}
add_action('wp_enqueue_scripts', 'aiwp_scripts');

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


function wp_pagination() {
      global $wp_query;

      $big = 999999999;

      echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '/page/%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 1,
            'end_size' => 2,
            'prev_text' => '&#8810;',
            'next_text' => '&#8811;',
      ) );
};

function add_products_to_category( $query ) {
    if ( ! is_admin() && $query->is_category() && $query->is_main_query() ) {

         $query->set( 'post_type', array( 'produto' ) );
         $query->set( 'posts_per_page', '9' );
         $query->set( 'orderby', 'date' );
         $query->set( 'orderby', 'meta_value' );

    }
}
add_action( 'pre_get_posts', 'add_products_to_category' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function meu_widget() {

    register_sidebar( array(
        'name' => 'Widgets',
        'id' => 'widgets',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="Widgets">',
        'after_title' => '</h2>',
        'description' => 'área de widgets',
    ) );

}
add_action( 'widgets_init', 'meu_widget' );


/* Create theme slug */
function cts_add_theme_slug() {
	return 'gelius';
}

add_action( 'after_setup_theme', 'mytheme_load_textdomain' );

function mytheme_load_textdomain() {
  load_theme_textdomain( cts_add_theme_slug(), get_template_directory() . '/languages');
}

function bt_whatsapp(){

  return '<div class="whats">
      <a href="https://api.whatsapp.com/send?phone=' . get_field("c_whatsapp", 2) . '" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="#4BA818"><path d="M12 0a12 12 0 1 1 0 24 12 12 0 0 1 0-24zm.14 4.5a7.34 7.34 0 0 0-6.46 10.82l.15.26L4.5 19.5l4.08-1.3a7.38 7.38 0 0 0 10.92-6.4c0-4.03-3.3-7.3-7.36-7.3zm0 1.16c3.41 0 6.19 2.76 6.19 6.15a6.17 6.17 0 0 1-9.37 5.27l-.23-.15-2.38.76.77-2.28a6.08 6.08 0 0 1-1.17-3.6 6.17 6.17 0 0 1 6.19-6.15zM9.66 8.47a.67.67 0 0 0-.48.23l-.14.15c-.2.23-.5.65-.5 1.34 0 .72.43 1.41.64 1.71l.14.2a7.26 7.26 0 0 0 3.04 2.65l.4.14c1.44.54 1.47.33 1.77.3.33-.03 1.07-.43 1.22-.85.15-.42.15-.78.1-.85-.02-.05-.08-.08-.15-.12l-1.12-.54a5.15 5.15 0 0 0-.3-.13c-.17-.06-.3-.1-.41.09-.12.18-.47.58-.57.7-.1.1-.18.13-.32.08l-.4-.18a4.64 4.64 0 0 1-2.13-1.98c-.1-.18-.01-.28.08-.37l.27-.31c.1-.1.12-.18.18-.3a.3.3 0 0 0 .01-.26l-.1-.23-.48-1.15c-.15-.36-.3-.3-.4-.3l-.35-.02z"/></svg>
      </a>
    </div>';

}

add_action( 'init', 'create_custom_tax_tipo' );
function create_custom_tax_tipo(){
    $custom_tax_nome = 'colors_product';
    $custom_post_type_nome = 'produto';
    $args = array(
        'label' => __('Cores'),
        'hierarchical' => true,
        'add_new_item' => 'Adicionar nova cor',
        'rewrite' => array('slug' => 'cores'),
    );
    register_taxonomy( $custom_tax_nome, $custom_post_type_nome, $args );
}

/*
*
* Get images and colors the products
*
*/
add_action('wp_enqueue_scripts', 'Wps_load_scripts');
function Wps_load_scripts() {

  wp_register_script( 'my-script', get_template_directory_uri() . '/assets/js/colors-ajax.js', array( 'jquery' ), '1.0', true );
  wp_localize_script( 'my-script', 'ajaxLoad_ajaxurl', ['ajaxurl' => admin_url('admin-ajax.php')]);

  wp_enqueue_script( 'my-script');

}

add_action('wp_ajax_imgs_product', 'imgs_product');
add_action('wp_ajax_nopriv_imgs_product', 'imgs_product');
function imgs_product(){

  if (isset($_POST['currentpage'])) {
    $currentpage = $_POST['currentpage'];
  }

  if (isset($_POST['categories'])) {

    $get_cat = $_POST['categories'];

    if ($get_cat) {
      $categories = array(
          'taxonomy' => 'category',
          'field'    => 'slug',
          'terms'    => $get_cat,
      );
    };
  }

  if (isset($_POST['colors'])) {

    $get_cor = $_POST['colors'];

    if ($get_cor) {
      $colors = array(
          'taxonomy' => 'colors_product',
          'field'    => 'slug',
          'terms'    => $get_cor,
      );
    };
  }

  if ($currentpage >= 2) {
    if ($currentpage > 1) {
      $offset = ($currentpage * 9) - 9;
    } else {
      $offset = 0;
    }
  }


  $args = array(
    'post_type'      => 'produto',
    'posts_per_page' => 9,
    'meta_key'			 => 'lancamento',
    'orderby'			   => 'meta_value',
    'order'				   => 'DESC',
    'offset'         => $offset,
    'post_status'    => array('publish'),
    'tax_query'      => array(
      'relation'     => 'OR',
      @$colors,
      @$categories,
    ),
  );

  $wp_query = new WP_Query( $args );

  if ( $wp_query->have_posts() ) :

    while( $wp_query->have_posts() ) : $wp_query->the_post();

      $exclusivo = get_field('produto_exclusivo');
      $item = 0;

      if ( $exclusivo[$item] != 'sim' ) :

        $link  = get_the_permalink();
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        $title = get_the_title();
        $get_lancamento = get_field('lancamento', get_the_ID());
        $lancamento = $get_lancamento ? '<span>Lançamento</span>' : '';

        $json['products'][] = array(
          '<div class="product">
              <a href="'. $link  .'">
                  <div class="img">
                  <img src="'. $thumb .'" class="fit" alt="Imagem '. $title .'"/>
                  </div>
                  <h2 class="h1">'. $title .'</h2>
              </a>
              '. $lancamento .'
          </div>');

      endif;

    endwhile;

    function construct_paginaton($numpages, $current){

      if ($numpages <= 1) {
        return;
      }

      if ($numpages > 5 && $current > 3) {
        if(($current + 2) < $numpages){
          $init = $current - 2;
          $totalpages = $current + 2;
        }else{
          $init = $numpages - 4;
          $totalpages = $numpages;
        }
      }else{
        $init = 1;
        if ($numpages < 5) {
          $totalpages = $numpages;
        }else{
          $totalpages = 5;
        }
      }

      for ($i=$init; $i <= $totalpages; $i++) {

        $active = ($i == $current) ? 'current' : '';
        $result .= '<button type="button" data-numpage="'. $i .'" class="bt-paginate '. $active .'">'. $i .'</button>';

      }

      if ( $numpages > 5 && $current > 3 ){
        $prev = '<button type="button" data-numpage="'. 1 .'" class="prev bt-paginate"><<</button>';
      }

      if ($numpages > 5 && ($current + 2 ) < $numpages ){
        $next = '<button type="button" data-numpage="'. $numpages .'" class="next bt-paginate">>></button>';
      }

      return $prev . $result . $next;

    }

    $json['pagination'] = ($wp_query->max_num_pages > 0) ? construct_paginaton($wp_query->max_num_pages, $currentpage) : '';

    wp_send_json($json);


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

}
