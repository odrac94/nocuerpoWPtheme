<?php
get_header();
?>

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
                    echo '<a href="#" class="category-link" data-slug="' . $category->slug . '">' . esc_html($category->name) . '</a>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Sección de Entrada Destacada -->
    <section id="entrada-destacada" class="seccion">
    </section>


    <!-- Sección de Entradas Recientes -->
    <section id="entrada-reciente" class="seccion">
    </section>

<script>
    jQuery(document).ready(function($) {
        // Inicialmente oculta las secciones que se actualizarán mediante AJAX
        $('#entrada-destacada, #entrada-reciente').hide();

        $('.category-link').on('click', function(e) {
            e.preventDefault();
            var categorySlug = $(this).data('slug');

            // Remover la clase 'selected' de todas las categorías y añadirla a la actual
            $('.category-link').removeClass('selected');
            $(this).addClass('selected');

            // AJAX para Entrada Destacada
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'load_featured_post',
                    category: categorySlug
                },
                success: function(response) {
                    $('#entrada-destacada').html(response).show();
                }
            });

            // AJAX para Entradas Recientes
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'load_recent_posts',
                    category: categorySlug
                },
                success: function(response) {
                    $('#entrada-reciente').html(response).show();
                }
            });
        });

        // Cargar automáticamente la primera categoría al cargar la página
        $('.category-link').first().click();
    });
</script>

<?php
get_footer();
?>
