<?php /* Template Name: [Template] Sobre */ get_header(); ?>

<section class="about">
    <div class="container">
        <div class="row middle">
            <div class="col-m6">
                <div class="tx">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
            <div class="col-m6">
                <div class="img">
                    <?php echo get_the_post_thumbnail( 25, 'full', array( 'class' => 'fit' ) ); ?>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php

get_footer();