<?php
/* Template Name: Landing Page */

get_header();
?>

<!-- Landing Page Content -->
<section id="landing-form" class="seccion">
    <div class="contenedor">
        <div class="contenedor--img">
            <img src="https://nocuerpo.com/wp-content/uploads/2024/05/No-cuerpo-logo-landing-page-artistas.png" alt="Descripción alternativa de la imagen">
        </div>
    </div>

    <div class="contenedor">
        <?php echo do_shortcode('[contact-form-7 id="46b23f9" title="formulario artistas"]'); ?>
    </div>
</section>
<?php
get_footer();
?>