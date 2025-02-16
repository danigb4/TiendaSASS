<?php

    require 'productos.php';

    class Categorias
    {
        public function verProductosCategoria($categoria) : Array
        {
            if (count($categoria) <= 10) {

                return $categoria;

            } else {

                $seleccionados = [];
                $indicesSeleccionados = [];

                while (count($seleccionados) < 10) {

                    $random = rand(1, count($categoria));

                    if (!in_array($random, $indicesSeleccionados)) {

                        $seleccionados[] = $categoria[$random];
                        $indicesSeleccionados[] = $random;
                    }
                }

                return $seleccionados;
            }
        }
    }

    $verProductos = new Categorias();

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
</head>
<body>

<header>

    <div class="logo-container">
        <img src="img/logo.png" alt="Logo de la tienda" style="max-height: 80px;">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#inicio">Inicio</a>
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
                            <li><a class="dropdown-item" href="#outlet">Outlet</a></li>
                            <li><a class="dropdown-item" href="#nueva-temporada">Nueva temporada</a></li>
                            <li><a class="dropdown-item" href="#rebajas">Rebajas</a></li>
                            <li><a class="dropdown-item" href="#oferta">Oferta</a></li>
                            <li><a class="dropdown-item" href="#productos-normales">Productos normales</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button id="theme-toggle" class="btn btn-secondary">Modo Oscuro</button>
        </div>
    </nav>

</header>

<main>

    <div id="inicio" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carrousel/carrousel1.webp" class="d-block w-100" alt="Imagen de carrousel">
                <div class="carousel-caption animate__animated animate__fadeIn">
                    <h2><a href="#nueva-temporada">Nueva Colección Primavera</a></h2>
                    <p>Descubre las últimas tendencias de la temporada</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carrousel/carrousel2.jpg" class="d-block w-100" alt="Imagen de carrousel">
                <div class="carousel-caption animate__animated animate__fadeIn">
                    <h2><a href="#ofertas">Ofertas Especiales</a></h2>
                    <p>Hasta 50% de descuento en selección de productos</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carrousel/carrousel3.jpg" class="d-block w-100" alt="Imagen de carrousel">
                <div class="carousel-caption animate__animated animate__fadeIn">
                    <h2>Envío Gratuito</h2>
                    <p>En todos los pedidos superiores a 30€</p>
                </div>
            </div>
        </div>
    </div>


    <div class="message-body">
        <h1>Bienvenido a nuestra Tienda de Ropa</h1>
        <p>Encuentra las mejores ofertas y productos de la nueva temporada.</p>
    </div>

    <div class="categorias-container">
        <div class="categoria nueva-temporada">
            <h2 id="nueva-temporada"><a href="categoria.php?categoria=nuevaTemporada">Nueva temporada</a></h2>
            <hr>

            <div class="productos-container">
                <?php foreach ($verProductos->verProductosCategoria($nuevaTemporada) as $producto): ?>
                    <div class="producto">
                        <img src=" <?= $producto['img'] ?>" alt=" <?= $producto['nombre'] ?>">
                        <h3><?= $producto['nombre'] ?></h3>
                        <p> <?= number_format($producto['precio'], 2) ?>€</p>
                        <button><a href="detalles_producto.php?id=<?= $producto['id'] ?>&categoria=nuevaTemporada">COMPRAR</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="categoria rebajas">
            <h2 id="rebajas"><a href="categoria.php?categoria=rebajas">Rebajas</a></h2>
            <hr>

            <div class="productos-container">
                <?php foreach ($verProductos->verProductosCategoria($rebajas) as $producto): ?>
                    <div class="producto">
                        <img src=" <?= $producto['img'] ?>" alt=" <?= $producto['nombre'] ?>">
                        <h3><?= $producto['nombre'] ?></h3>
                        <p> <?= number_format($producto['precio'], 2) ?>€</p>
                        <button><a href="detalles_producto.php?id=<?= $producto['id'] ?>&categoria=rebajas">COMPRAR</a></button>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="categoria ofertas">
            <h2 id="oferta"><a href="categoria.php?categoria=oferta">Ofertas</a></h2>
            <hr>

            <div class="productos-container">
                <?php foreach ($verProductos->verProductosCategoria($oferta) as $producto): ?>
                    <div class="producto">
                        <img src=" <?= $producto['img'] ?>" alt=" <?= $producto['nombre'] ?>">
                        <h3><?= $producto['nombre'] ?></h3>
                        <p> <?= number_format($producto['precio'], 2) ?>€</p>
                        <button><a href="detalles_producto.php?id=<?= $producto['id'] ?>&categoria=oferta">COMPRAR</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="categoria outlet">
            <h2 id="outlet"><a href="categoria.php?categoria=outlet">Outlet</a></h2>
            <hr>

            <div class="productos-container">
                <?php foreach ($verProductos->verProductosCategoria($outlet) as $producto): ?>
                    <div class="producto">
                        <img src=" <?= $producto['img'] ?>" alt=" <?= $producto['nombre'] ?>">
                        <h3><?= $producto['nombre'] ?></h3>
                        <p> <?= number_format($producto['precio'], 2) ?>€</p>
                        <button><a href="detalles_producto.php?id=<?= $producto['id'] ?>&categoria=outlet">COMPRAR</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="categoria productos-normales">
            <h2 id="productos-normales"><a href="categoria.php?categoria=productosNormales">Productos normales</a></h2>
            <hr>

            <div class="productos-container">
                <?php foreach ($verProductos->verProductosCategoria($productosNormales) as $producto): ?>
                    <div class="producto">
                        <img src=" <?= $producto['img'] ?>" alt=" <?= $producto['nombre'] ?>">
                        <h3><?= $producto['nombre'] ?></h3>
                        <p> <?= number_format($producto['precio'], 2) ?>€</p>
                        <button><a href="detalles_producto.php?id=<?= $producto['id'] ?>&categoria=productosNormales">COMPRAR</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
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

