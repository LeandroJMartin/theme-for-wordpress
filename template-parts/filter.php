<?php

    $cat = $args['category'];
    
    if ( $cat != 'all' ) {
        
        $cat_id = get_cat_ID ( $cat );
        $parent_id = wp_get_term_taxonomy_parent_id($cat_id, 'category');

    }else{

        $parent_id = 0;

    }

    function get_taxonomies_and_child( $taxonomy_name, $termId = 0, $parent = 0) {

        $childOf = ['child_of' => $termId];
        $child_of = ($termId > 0) ? $childOf : '';

        $defaults = array(
            'taxonomy'   => $taxonomy_name,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => true,
            $child_of,          
            'parent'     => $parent,
        );
    
        $taxonomies = get_terms( $defaults );
    
        if ( empty( $taxonomies ) || is_wp_error( $taxonomies ) ) {
            return false;
        }   
        return $taxonomies;
        
    }

?>

<h3>Produtos</h3>

<ul class="actives">
    <span>Filtros</span>    
</ul>

<?php

$category = get_taxonomies_and_child('category', 0, 0);
if( $category ) :
    
    ?>

    <ul class="flines">
        <strong>Linhas</strong>
        <?php

            foreach ($category as $value) :

                $caterm_id[] = get_cat_ID( $value->slug );

                ?>
                <li data-status="off" data-block="flines">
                    <label for="<?php echo $value->slug; ?>">
                        <input type="checkbox" value="<?php echo $value->slug; ?>" id="<?php echo $value->slug; ?>" class="option-input checkbox">
                        <span><?php echo $value->name; ?></span>
                    </label>
                </li>
                <?php

            endforeach;

        ?>
    </ul>
    <?php
    
endif;


?>

<ul class="tipes">
    <strong>Tipo</strong>
    <?php

    $count = count($caterm_id); 

    for ($i=0; $i < $count; $i++) :  

        $children = get_taxonomies_and_child('category', $parent_id, $caterm_id[$i]);

        if( $children ) :
                    
            foreach ($children as $child) :

                ?>
                <li data-status="off" data-block="tipes">
                    <label for="<?php echo $child->slug; ?>">
                        <input type="checkbox" value="<?php echo $child->slug; ?>" id="<?php echo $child->slug; ?>" class="option-input checkbox">
                        <span><?php echo $child->name; ?></span>
                    </label>
                </li>
                <?php

            endforeach; 
        endif;
    endfor;

    ?>

</ul>

<?php

$colors = get_taxonomies_and_child('colors_product', 0, 0);
if( $colors ) :

    ?>

    <ul class="colors">
        <strong>Cor</strong>
        <div>
            <?php

                
                foreach ($colors as $cor) :

                    ?>
                    <li data-status="off" data-block="colors">
                        <label for="<?php echo $cor->slug; ?>">
                            <input type="checkbox" value="<?php echo $cor->slug; ?>" id="<?php echo $cor->slug; ?>" class="option-input checkbox">
                            <span><?php echo $cor->name; ?></span>
                        </label>
                    </li>
                    <?php

                endforeach;

            ?>
        </div>
    </ul>

    <?php

endif;