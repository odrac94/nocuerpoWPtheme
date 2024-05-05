<?php

function nocuerpo_assets() {
    // Encolar fuentes de Adobe Fonts
    wp_enqueue_style('nocuerpo-adobe-fonts', 'https://use.typekit.net/vcz4fvs.css', array(), null);

    // Encolar estilos base del tema
    wp_enqueue_style('nocuerpo-base', get_template_directory_uri() . '/assets/css/base.css', array(), '1.0.0');
    wp_enqueue_style('nocuerpo-layout', get_template_directory_uri() . '/assets/css/layout.css', array('nocuerpo-base'), '1.0.0');
    wp_enqueue_style('nocuerpo-components', get_template_directory_uri() . '/assets/css/components.css', array('nocuerpo-layout'), '1.0.0');
    wp_enqueue_style('nocuerpo-pages', get_template_directory_uri() . '/assets/css/pages.css', array('nocuerpo-components'), '1.0.0');
    wp_enqueue_style('nocuerpo-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('nocuerpo-pages'), '1.0.0');

    // Encolar el script JavaScript personalizado
    wp_enqueue_script('nocuerpo-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);

    // Encolar CSS específico de la landing page solo si la página actual usa la plantilla "Landing Page"
    if (is_page_template('landing-page.php')) {
        wp_enqueue_style('nocuerpo-landing-page', get_template_directory_uri() . '/assets/css/landing-page.css', array(), '1.0.0');
    }
}

add_action('wp_enqueue_scripts', 'nocuerpo_assets');

function nocuerpo_register_menus() {
    register_nav_menus(array(
        'menu-principal' => esc_html__('Menu Principal', 'nocuerpo'),
    ));
}
add_action('after_setup_theme', 'nocuerpo_register_menus');


function nocuerpo_analytics() {
    ?>

    <?php
}

add_action('wp_body_open', 'nocuerpo_analytics');

function nocuerpo_theme_supports(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo',
    array(
        'width' => 120,
        'height' => 65.86,
        'flex-width' => true,
        'flex-height' => true,
    )
);
}

add_action('after_setup_theme', 'nocuerpo_theme_supports');

function nocuerpo_theme_setup() {
    add_theme_support('post-thumbnails');
    add_image_size('rectangular-size', 1366, 768, true); // true para crop exacto
}
add_action('after_setup_theme', 'nocuerpo_theme_setup');


function nocuerpo_add_menus() {
    register_nav_menus(
        array (
        'menu-principal' => 'Menu principal',
        'menu-responsive' => 'Menu responsive'
        )
    );
}

add_action('after_setup_theme', 'nocuerpo_add_menus');

function nocuerpo_add_sidebar() {
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'pie-pagina',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}

add_action('widgets_init', 'nocuerpo_add_sidebar');

function load_featured_post() {
    $category_slug = $_POST['category'];
    $args = array(
        'posts_per_page' => 1,
        'category_name'  => $category_slug,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="contenedor">';
            echo '<div class="contenedor--titular"><h2>Destacado</h2></div>';
            echo '<div class="entrada-destacada">';
            // Enlace en la imagen
            if (has_post_thumbnail()) {
                echo '<a href="' . get_permalink() . '" class="entrada-img-link">';
                the_post_thumbnail('full', array('class' => 'contenedor--img'));
                echo '</a>';
            }
            echo '<div class="entrada-contenido">';
            // Enlace en el título
            echo '<a href="' . get_permalink() . '" class="entrada-titulo-link">';
            the_title('<h2>', '</h2>');
            echo '</a>';
            echo '<h3>Por ' . get_the_author() . '</h3>';
            echo '</div>'; // Cierre de .entrada-contenido
            echo '</div>'; // Cierre de .entrada-destacada
            echo '</div>'; // Cierre de .contenedor
        }
    } else {
        echo '<p>No se encontraron entradas destacadas en esta categoría.</p>';
    }
    wp_reset_postdata();
    die();
}

function load_recent_posts() {
    $category_slug = $_POST['category'];
    $args = array(
        'posts_per_page' => 10, // Ajusta este número según tus necesidades
        'category_name'  => $category_slug,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $query = new WP_Query($args);

    // Imprime el encabezado antes de las entradas recientes
    echo '<div class="contenedor">';
    echo '<div class="contenedor--titular"><h2>Recientes</h2></div>';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="entrada-contenedor contenedor--flex">';
            // Enlace en la imagen
            echo '<div class="contenedor--img columna">';
            echo '<a href="' . get_permalink() . '" class="entrada-img-link">';
            if (has_post_thumbnail()) {
                the_post_thumbnail('rectangular-size', array('class' => ''));
            }
            echo '</a>';
            echo '</div>'; // Cierre de .contenedor--img
            echo '<div class="entrada-contenido columna">';
            // Enlace en el título
            echo '<a href="' . get_permalink() . '" class="entrada-titulo-link">';
            the_title('<h2>', '</h2>');
            echo '</a>';
            echo '<h3>Por ' . get_the_author() . '</h3>';
            the_date('F j, Y', '<p>', '</p>');
            echo '</div>'; // Cierre de .entrada-contenido
            echo '</div>'; // Cierre de .entrada-contenedor
        }
    } else {
        echo '<p>No se encontraron entradas recientes en esta categoría.</p>';
    }
    echo '</div>'; // Cierre del contenedor general

    wp_reset_postdata();
    die();
}


add_action('wp_ajax_load_featured_post', 'load_featured_post');
add_action('wp_ajax_nopriv_load_featured_post', 'load_featured_post');
add_action('wp_ajax_load_recent_posts', 'load_recent_posts');
add_action('wp_ajax_nopriv_load_recent_posts', 'load_recent_posts');