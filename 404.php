<?php /* [Template] 404 */ get_header(); ?>

<section>
	<div class="container">
			<div class="error-404">
					<h1 class="page-title"><?php _e('Oops!', cts_add_theme_slug()); ?></h1>
					<h3><?php _e('Essa página não pode ser encontrada.', cts_add_theme_slug()); ?></h3>
					<p><?php _e('Parece que nada foi encontrado neste local.', cts_add_theme_slug()); ?></p>
					<div class="bt-404">
						<a href="<?php echo get_site_url(); ?>" ><div class="btn"><?php _e('Voltar a Home', cts_add_theme_slug()); ?></div></a>
					</div>
			</div>
	</div>
</section>

<?php

get_footer();
