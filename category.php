<?php get_header(); ?>

<!-- Sección de Categorías -->
<section id="entrada-categorias" class="seccion">
    <div class="contenedor">
        <div class="contenedor--titular">
            <h1><?php single_cat_title('BLOG - '); ?></h1>
        </div>
        <div class="categorias">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                $class = is_category($category->term_id) ? ' class="selected"' : '';
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '"' . $class . '>' . esc_html($category->name) . '</a>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Sección para mostrar entradas relacionadas a la categoría actual -->
<section class="seccion">
    <div class="contenedor">
        <?php if (have_posts()) : ?>
            <header class="contenedor--titular">
                <h2>Entradas en "<?php single_cat_title(); ?>"</h2>
            </header>

            <div class="contenedor--grid">
                <?php
                // Loop a través de las entradas de la categoría
                while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('columna'); ?>>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="contenedor--img entrada-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <header class="entry-header">
                            <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                        </header>

                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No se encontraron entradas en esta categoría.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
