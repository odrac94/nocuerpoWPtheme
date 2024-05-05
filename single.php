<?php get_header(); ?>

    <section id="entrada" class="seccion">
        <div class="contenedor">
            <!-- MIGAS DE PAN -->
            <div class="migas">
                <?php if(function_exists('bcn_display')) {
                    bcn_display();
                }?>
            </div>

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <?php if(has_post_thumbnail()): ?>
                    <div class="contenedor--img">
                        <!-- imagen de portada de la entrada -->
                        <?php the_post_thumbnail('full', ['class' => '']); ?>
                    </div>
                <?php endif; ?>

                <div class="entrada-titular">
                    <!-- TITULO DE LA ENTRADA -->
                    <h1><?php the_title(); ?></h1>
                </div>

                <div class="entrada-metadatos">
                    <!-- AUTOR DE LA ENTRADA Y FECHA DE PUBLICACION DE LA ENTRADA -->
                    <span>Publicado por <?php the_author_posts_link(); ?> en <?php the_time('F j, Y'); ?></span>
                </div>

                <div class="entrada-contenido">
                    <!-- AQUI VA EL CONTENIDO DE LA ENTRADA (TEXTOS E IMAGENES) -->
                    <?php the_content(); ?>
                </div>

            <?php endwhile; else: ?>
                <p>No se encontraron entradas.</p>
            <?php endif; ?>
        </div>
    </section>

<?php get_footer(); ?>
