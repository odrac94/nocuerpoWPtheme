<?php get_header(); ?>

<!-- Sección de Categorías -->
<section id="entrada-categorias" class="seccion">
    <div class="contenedor">
        <div class="contenedor--titular">
            <h1>BLOG</h1>
        </div>
        <div class="categorias">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                // Asegúrate de que los enlaces apunten a la URL de la categoría
                echo '<a href="' . get_category_link($category->term_id) . '" class="category-link">' . esc_html($category->name) . '</a>';
            }
            ?>
        </div>
    </div>
</section>

<section id="search-results" class="seccion">
    <div class="contenedor">
        <div class="contenedor--titular">
            <h2>Resultados de búsqueda para: <?php echo get_search_query(); ?></h2>
        </div>
        <div class="contenedor entradas">
            <?php if ( have_posts() ) : ?>
                <!-- Inicio del Loop -->
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="entrada-contenedor contenedor--flex">
                        <div class="contenedor--img columna">
                            <!-- Enlace en la imagen -->
                            <a href="<?php the_permalink(); ?>" class="entrada-img-link">
                                <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('rectangular-size', array('class' => ''));
                                } ?>
                            </a>
                        </div>
                        <div class="entrada-contenido columna">
                            <!-- Enlace en el título -->
                            <a href="<?php the_permalink(); ?>" class="entrada-titulo-link">
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <!-- Información adicional como fecha, autor, etc. -->
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- Fin del Loop -->
            <?php else : ?>
                <p>No se encontraron entradas que coincidan con tu búsqueda.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    // Aquí tu JavaScript si es necesario
</script>

<?php get_footer(); ?>
