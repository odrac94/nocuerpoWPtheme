<?php
get_header();

?>

<section id="banner" class="seccion">
        <div class="contenedor">
            <div class="contenedor--img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/no-cuerpo_banner-principal-negro.png" alt="No Cuerpo: Un cuerpo donde caben muchos cuerpos">
            </div>
        </div>
    </section>

    <section id="topicos" class="seccion">
        <div class="contenedor">

            <div class="contenedor--titular">
                <h2>TÓPICOS</h2>
            </div>

            <div class="topicos">
                <div class="topicos__contenedor">
                    <div class="topicos__img cuadrada">
                        <img src="https://nocuerpo.com/wp-content/uploads/2023/08/queer-art.jpg" alt="Queer Art">
                        <div class="overlay">
                            <a href="http://no-cuerpo.local/category/queer-art/">Queer Art</a>
                        </div>
                    </div>

                    <div class="topicos__img horizontal">
                        <img src="https://nocuerpo.com/wp-content/uploads/2023/08/arte-fronterizo.jpg" alt="Arte Fronterizo">
                        <div class="overlay">
                            <a href="http://no-cuerpo.local/category/arte-fronterizo/">Arte fronterizo</a>
                        </div>
                    </div>
                </div>

                <div class="topicos__contenedor">
                    <div class="topicos__img">
                        <img src="https://nocuerpo.com/wp-content/uploads/2023/08/historia-del-arte.jpg" alt="Historia del Arte">
                        <div class="overlay">
                            <a href="http://no-cuerpo.local/category/historia-del-arte/">Historia del arte</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- BLOG -->
    <section id="blog" class="seccion">
        <div class="contenedor contenedor--titular">
            <h2>BLOGS</h2>
        </div>

        <div class="contenedor">

            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>

                    <article class="contenedor--flex entrada">
                        <div class="columna">

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="entrada-miniatura">
                                    <div class="contenedor--img">
                                        <?php the_post_thumbnail('miniatura'); ?>
                                    </div>
                                </a>
                            <?php endif; ?>

                        </div>
                        <div class="columna">

                            <div class="entrada-contenido">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="entrada-titulo"><?php the_title(); ?></h3>
                                    <p class="entrada-autor">Por <?php the_author(); ?></p>
                                </a>
                            </div>

                        </div>
                    </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No hay entradas disponibles.';
            endif;
            ?>

        </div>

        <div class="contenedor">
            <div class="contenedor--btn">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
                    Ver más contenido
                </a>
            </div>
        </div>
    </section>

    <!-- IMG FINAL -->
    <section class="seccion">
        <div class="contenedor">
            <figure class="contenedor--img">
                <img src="<?php echo get_template_directory_uri()?>/assets/no-cuerpo_un-cuerpo-donde-caben-muchos-cuerpos_banner-negro.png" alt="">
            </figure>
        </div>
    </section>

<?php get_footer() ?>