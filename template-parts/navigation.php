<div class="navigation">
    <div class="row">
        <div class="paginate">

        <?php

            $paginate = $args['paginate'];

            $url = $_SERVER["REQUEST_URI"];
            $cat = explode('/', $url);

            $filterCat = array_filter($cat);

            if ($paginate === false) :

                ?>

                <ul class="breadcrumb">
                    <li><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-home.svg" alt="Icon Home" /> <span>Home</span></a></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/chevron-right.svg" alt="Icon" /></li>
                    <?php

                        $quant = count($filterCat) - 1;
                        $end = end($filterCat);

                        if (in_array("page", $filterCat)) {
                            $quant = array_search("page", $filterCat) - 1;
                            $end = $filterCat[$quant];
                        }

                        for ($i = 2; $i <= $quant; $i++) {

                            $link = ($filterCat[$i] === 'categoria') ? '<span>'. ucfirst($filterCat[$i]) .'</span>' : '<a href="'. get_site_url() . '/' . $filterCat[$i] . '">'. ucfirst($filterCat[$i]) .'</a>';

                            echo '<li>'. $link .'</li>';
                            echo '<li><img src="'. get_template_directory_uri() .'/assets/img/chevron-right.svg" alt="Icon" /></li>';

                        }

                    ?>
                    <li><?php echo ucfirst($end); ?></li>
                </ul>

                <?php

            else :

                if($wp_query->max_num_pages > 0) :

                    ?>

                    <div id="paginate" class="paginate">
                        <p>Páginas</p>
                        <div class="links">
                            <?php wp_pagination(); ?>
                        </div>
                    </div>

                    <?php

                endif;
            endif;

        ?>
        </div>
        <div class="az-za end">
            <button type="button" data-order="a-z" class="active">A - Z</button>
            <button type="button" data-order="z-a">Z - A</button>
        </div>
    </div>
</div>
