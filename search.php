<?php /* Template Name: [Template] Search */ get_header(); ?>

<div class="container pg-search">
	<div class="title-search">
		<h2>Resultados da busca por: <?php the_search_query(); ?></h2>
	</div>
	<div class="articles">
		<?php

		if ($_GET['s']) {
			$term_s = get_search_query();
		}

		$wp_query = new WP_Query(array(
			'post_type' => 'products',
			'posts_per_page' => 12
		));

		if (have_posts()) :

			while (have_posts()) : the_post();

				$pp = get_post();

          ?>

					<div class="search-row">
						<a href="<?php the_permalink(); ?>">
							<h4><?php the_title(); ?></h4>
						</a>
					</div>
          <?php

			endwhile;
			wp_reset_query();

		else :

			echo '<p>Nenhum post encontrado</p>';

		endif;

		?>
	</div>

</div>

<?php

get_footer();
