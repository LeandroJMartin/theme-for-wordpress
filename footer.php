<footer>
    <div class="container">
        <div class="footer">
          <div class="row middle">
            <div class="address">
                <p><?php the_field('c_endereco', 2); ?></p>
            </div>
            <div class="contact">
                <a href="tel:<?php the_field('c_telefone', 2); ?>"><?php the_field('c_telefone', 2); ?></a>
                <p>FAX: <?php the_field('c_fax', 2); ?></p>
                <a href="mailto:<?php the_field('c_email', 2); ?>"><?php the_field('c_email', 2); ?></a>
                <div class="social">
                    <a target="_blank" rel="noreferrer" href="<?php the_field('link_facebook', 2); ?>">
                        <svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="defaultColor"><path d="M24 12.07C24 5.41 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.04V9.41c0-3.02 1.8-4.7 4.54-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.5c-1.5 0-1.96.93-1.96 1.89v2.26h3.32l-.53 3.5h-2.8V24C19.62 23.1 24 18.1 24 12.07"/></svg>
                    </a>
                    <a target="_blank" rel="noreferrer" href="<?php the_field('link_instagram', 2); ?>">
                        <svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="defaultColor"><path d="M16.98 0a6.9 6.9 0 0 1 5.08 1.98A6.94 6.94 0 0 1 24 7.02v9.96c0 2.08-.68 3.87-1.98 5.13A7.14 7.14 0 0 1 16.94 24H7.06a7.06 7.06 0 0 1-5.03-1.89A6.96 6.96 0 0 1 0 16.94V7.02C0 2.8 2.8 0 7.02 0h9.96zm.05 2.23H7.06c-1.45 0-2.7.43-3.53 1.25a4.82 4.82 0 0 0-1.3 3.54v9.92c0 1.5.43 2.7 1.3 3.58a5 5 0 0 0 3.53 1.25h9.88a5 5 0 0 0 3.53-1.25 4.73 4.73 0 0 0 1.4-3.54V7.02a5 5 0 0 0-1.3-3.49 4.82 4.82 0 0 0-3.54-1.3zM12 5.76c3.39 0 6.2 2.8 6.2 6.2a6.2 6.2 0 0 1-12.4 0 6.2 6.2 0 0 1 6.2-6.2zm0 2.22a3.99 3.99 0 0 0-3.97 3.97A3.99 3.99 0 0 0 12 15.92a3.99 3.99 0 0 0 3.97-3.97A3.99 3.99 0 0 0 12 7.98zm6.44-3.77a1.4 1.4 0 1 1 0 2.8 1.4 1.4 0 0 1 0-2.8z"/></svg>
                    </a>
                    <a target="_blank" rel="noreferrer" href="<?php the_field('link_youtube', 2); ?>">
                        <svg xmlns="https://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 24 24" fill="defaultColor"><path d="M12.04 3.5c.59 0 7.54.02 9.34.5a3.02 3.02 0 0 1 2.12 2.15C24 8.05 24 12 24 12v.04c0 .43-.03 4.03-.5 5.8A3.02 3.02 0 0 1 21.38 20c-1.76.48-8.45.5-9.3.51h-.17c-.85 0-7.54-.03-9.29-.5A3.02 3.02 0 0 1 .5 17.84c-.42-1.61-.49-4.7-.5-5.6v-.5c.01-.9.08-3.99.5-5.6a3.02 3.02 0 0 1 2.12-2.14c1.8-.49 8.75-.51 9.34-.51zM9.54 8.4v7.18L15.82 12 9.54 8.41z"/></svg>
                    </a>
                </div>
            </div>
            <div class="logo end">
                <a href="<?php echo get_site_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_preto.png" alt="Logotipo Gelius" />
                </a>
            </div>
          </div>
        </div>
        <div class="footer-dir row middle center tx-center pad-20">
            <p>® <?php bloginfo( 'name' ); echo ' '.date('Y').' | '; _e(' Todos os direitos reservados.', cts_add_theme_slug()); ?></p>
            <p>&nbsp<?php _e('Desenvolvido por', cts_add_theme_slug()); ?></p>
            <a href="https://mayacomunicacao.com.br" target="_blank" title="Maya Comunicação">
                <img alt="Maya Comunicação" class="mar-l-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-maya.svg" />
            </a>
        </div>
    </div>

</footer>

<?php

    wp_footer();

?>

</body>
</html>
