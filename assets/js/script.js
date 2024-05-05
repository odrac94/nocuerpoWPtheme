document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuClose = document.querySelector('.menu-close');
    const menuDesplegable = document.querySelector('.encabezado--desplegable');

    menuToggle.addEventListener('click', function() {
        menuDesplegable.style.display = 'block';
    });

    menuClose.addEventListener('click', function() {
        menuDesplegable.style.display = 'none';
    });
});