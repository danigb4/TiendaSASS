<?php

require 'productos.php';

if (isset($_GET['id']) && isset($_GET['categoria'])) {

    $id = FILTER_INPUT(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $categoria = FILTER_INPUT(INPUT_GET, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);


    $productosDeCategoria = $$categoria;

    $producto = $productosDeCategoria[$id];

}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="sass/indexSASS.css">
    <link rel="stylesheet" href="sass/detallesProducto.css">
</head>
<body>

<header>

    <div class="logo-container">
        <img src="img/logo.png" alt="Logo de la tienda" style="max-height: 80px;">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php#inicio">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.php#outlet">Outlet</a></li>
                            <li><a class="dropdown-item" href="index.php#nueva-temporada">Nueva temporada</a></li>
                            <li><a class="dropdown-item" href="index.php#rebajas">Rebajas</a></li>
                            <li><a class="dropdown-item" href="index.php#oferta">Oferta</a></li>
                            <li><a class="dropdown-item" href="index.php#productos-normales">Productos normales</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button id="theme-toggle" class="btn btn-secondary">Modo Oscuro</button>
        </div>
    </nav>

</header>

<main>

    <div class="message-body">
        <h1>Descubre las mejores prendas para tus mejores momentos</h1>
        <p>Envíos gratuitos con pedidos de más de 30€</p>
    </div>

    <div class="detalles-producto">
        <div class="img-dtll">
            <div class="detalle-img">
                <img src="<?= $producto['img'] ?>" alt="Imagen del producto">
            </div>
            <div class="detalle-nombrePrecio">
                <h3><?= $producto['nombre'] ?></h3>
                <p><?= number_format($producto['precio'], 2) ?>€</p>
            </div>
        </div>
        <div class="detalle-comprar">
            <button>Comprar</button>
            <button><a href="categoria.php?categoria=<?= $categoria ?> ">Articulos relacionados</a></button>
            <button class="center"><a href="index.php#inicio">Volver al inicio</a></button>
        </div>
    </div>



</main>

<footer>
    <div id="contacto" class="footer-content">
        <div class="contact-info">
            <p><i class="fas fa-phone"></i> +34 123 456 789</p>
            <p><i class="fas fa-envelope"></i> info@tiendaropa.com</p>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Tienda de Ropa. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        if (localStorage.getItem('dark-mode') === 'true') {
            body.classList.add('dark-mode');
            themeToggle.textContent = 'Modo Claro';
        }

        themeToggle.addEventListener('click', function() {
            body.classList.toggle('dark-mode');
            const isDarkMode = body.classList.contains('dark-mode');
            localStorage.setItem('dark-mode', isDarkMode);
            themeToggle.textContent = isDarkMode ? 'Modo Claro' : 'Modo Oscuro';
        });
    });
</script>

</body>
</html>

