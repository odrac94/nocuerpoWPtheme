<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a7cd977813.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-inner">
        <!-- Icono del menú para móviles -->
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Menú Desplegable -->
        <div class="encabezado--desplegable">
            <!-- Botón para cerrar el menú -->
            <button class="menu-close" aria-label="Cerrar menú">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <!-- Navegación -->
            <nav class="encabezado--navbar">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-principal', // Asegúrate de que este ubicación del menú coincide con el nombre que has definido en functions.php
                    'container' => false, // No queremos un contenedor div alrededor del menú
                    'menu_class' => 'navbar--elemento', // Clase CSS para el elemento <ul> del menú
                    'fallback_cb' => false, // No mostrar un menú de fallback si no hay menú asignado
                    'depth' => 2, // Permite submenús hasta dos niveles de profundidad
                ));
                ?>
            </nav>
        </div>

        <!-- Navegación principal -->
        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-principal',
                'menu_id'        => 'primary-menu',
            ));
            ?>
        </nav>

        <!-- Input de búsqueda -->
        <div class="search-box">
            <form action="<?php echo home_url('/'); ?>" method="get">
                <input type="search" name="s" placeholder="Buscar..." value="<?php the_search_query(); ?>">
                <i class="fa-solid fa-magnifying-glass"></i>
                <button type="submit" class="search-submit">
                    Enviar
                </button>
            </form>
        </div>


        <!-- Logo del sitio -->
        <div class="site-logo">
            <?php the_custom_logo(); ?>
        </div>
    </div>
</header>

<main>