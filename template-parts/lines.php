<?php

$caracteristicas = get_field('caracteristicas', 15);
$title = get_the_title(15);
$content = get_post(15);
$the_content = apply_filters('the_content', $content->post_content);

$colors = array(
    'bg-red',
    'bg-blue',
    'bg-yellow',
    'bg-green',
    'bg-red',
    'bg-blue',
    'bg-yellow',
    'bg-green',
);

$count = 0;

?>

<div class="lines">
    <div class="row middle">
        <div class="tx">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $the_content; ?></p>
        </div>
        <div class="itens">
            <?php

                foreach ($caracteristicas as $carac) :

                    $count++;

                    ?>
                    <div class="item <?php echo $colors[$count]; ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-lines.svg" alt="Icon" />
                        <h4><?php echo $carac['carac_titulo']; ?></h4>
                        <p><?php echo $carac['carac_descricao']; ?></p>
                    </div>

                    <?php

                endforeach;

            ?>

        </div>
    </div>
</div>