<?php /* Template Name: [Template] Representantes */ get_header(); ?>

<section class="agent">
    <div class="container">
        <div class="row middle">
            <div class="col-list order-1">
                <div class="tx">
                    <?php the_content(); ?>
                </div>
                <div class="list">
                    <div class="estado">
                        <p>Estado: <h2 id="es">Todos os estados</h2></p><br><span></span>
                    </div>
                    <ul id="adj_height">
                        <?php

                            $wp_query = new WP_Query(array(
                                'post_type' => 'ui_representantes',
                                'posts_per_page' => -1
                            ));

                            if( $wp_query->have_posts() ) :

                                while ( $wp_query->have_posts() ) : $wp_query->the_post();

                                    $estado = get_field('r_estado');
                                    
                                    ?>

                                    <li data-es="<?php echo $estado['value']; ?>" data-name="<?php echo $estado['label']; ?>">
                                        <h4><?php the_title(); ?></h4>
                                        <i><?php the_field('representacao') ?></i>
                                        <p class="num"><?php the_field('r_telefone') ?></p>
                                        <span>Região atendida:</span>
                                        <b><?php the_field('r_regiao'); ?></b>
                                    </li>

                                    <?php

                                endwhile;

                            else :

                                ?>
                                <li id="es-error">
                                    <h4>Nenhum representante encontrado para este estado</h4>
                                </li>
                                <?php

                            endif;

                        ?>
                        <li id="es-error" class="hide">
                            <h4>Nenhum representante encontrado para este estado</h4>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-map end order-2">
                <div class="map">
                    <?php get_template_part( 'template-parts/map' ); ?>
                </div>
                <div class="select-mobi">
                    <h3>Selecione um estado</h3>
                    <select name="" id="es-mobi">
                        <option value="default">---</option>
                        <option value="acre">Acre - AC</option>
                        <option value="alagoas">Alagoas - AL</option>
                        <option value="amapa">Amapá - AP</option>
                        <option value="amazonas">Amazonas - AM</option>
                        <option value="bahia">Bahia - BA</option>
                        <option value="ceara">Ceará - CE</option>
                        <option value="espiritosanto">Espírito Santo - ES</option>
                        <option value="goias">Goiás - GO</option>
                        <option value="maranhao">Maranhão - MA</option>
                        <option value="matogrosso">Mato Grosso - MT</option>
                        <option value="matogrossodosul">Mato Grosso do Sul - MS</option>
                        <option value="minasgerais">Minas Gerais - MG</option>
                        <option value="para">Pará - PA</option>
                        <option value="paraiba">Paraíba - PB</option>
                        <option value="parana">Paraná - PR</option>
                        <option value="pernambuco">Pernambuco - PE</option>
                        <option value="piaui">Piauí - PI</option>
                        <option value="riodejaneiro">Rio de Janeiro - RJ</option>
                        <option value="riograndedonorte">Rio Grande do Norte - RN</option>
                        <option value="riograndedosul">Rio Grande do Sul - RS</option>
                        <option value="rondonia">Rondônia - RO</option>
                        <option value="roraima">Roraima - RR</option>
                        <option value="santacatarina">Santa Catarina - SC</option>
                        <option value="saopaulo">São Paulo - SP</option>
                        <option value="sergipe">Sergipe - SE</option>
                        <option value="tocantins">Tocantins - TO</option>
                        <option value="distritofederal">Distrito Federal - DF</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
</section>

<?php

get_footer();

?>
