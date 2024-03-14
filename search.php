<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Productos</title>
    <link rel="stylesheet" href="vistas/styles.css" />
    <link rel="stylesheet" href="vistas/cart.css" />
</head>

<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="container-logo">
                    <h1>
                        <img class="logo-1" src="vistas/img/logo.png.png" alt="Logo" width="100" height="100" />
                    </h1>
                </div>


                <a href="vistas/login/login.php" id="user-icon-button">Iniciar de seccion/registrar</a>
                <div class="container-icon">
                    <div class="container-cart-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <div class="count-products">
                            <span id="contador-productos">0</span>
                        </div>
                    </div>

                    <div class="container-cart-products hidden-cart">
                        <div class="row-product hidden">
                            <div class="cart-product">
                                <div class="info-cart-product">
                                    <span class="cantidad-producto-carrito">1</span>
                                    <p class="titulo-producto-carrito">Zapatos Nike</p>
                                    <span class="precio-producto-carrito">$80</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-close">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>

                        <div class="cart-total hidden">
                            <h3>Total:</h3>
                            <span class="total-pagar">$200</span>
                        </div>
                        <p class="cart-empty">El carrito está vacío</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <ul class="menu">

                    <li><a href="index.php">inicio</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <section class="container container-features">
            <div class="card-feature">
                <i class="fa-solid fa-plane-up"></i>
                <div class="feature-content">
                    <span>Envío gratuito a nivel mundial</span>
                    <p>En pedido superior a $150</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-wallet"></i>
                <div class="feature-content">
                    <span>Contrareembolso</span>
                    <p>100% garantía de devolución de dinero</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-gift"></i>
                <div class="feature-content">
                    <span>Tarjeta regalo especial</span>
                    <p>Ofrece bonos especiales con regalo</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-headset"></i>
                <div class="feature-content">
                    <span>Servicio al cliente 24/7</span>
                    <p>LLámenos 24/7 al 12345678</p>
                </div>
            </div>
        </section>
        <section class="container top-products" id="Productos">
            <h1 class="heading-1">Productos</h1>
        </section>
        <form class="search-form" method="post" action="">
            <input type="text" name="search_term" placeholder="Ingrese el término de búsqueda">
            <button type="submit">buscar</button>
        </form>
        <div class="container-items">
            <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $searchTerm = isset($_POST['search_term']) ? $_POST['search_term'] : '';


                $filePath = 'productos copy.txt';


                if (file_exists($filePath)) {

                    $productsJson = file_get_contents($filePath);


                    $productsArray = json_decode($productsJson, true);



                    if (json_last_error() !== JSON_ERROR_NONE) {
                        echo 'Error: El archivo de productos no es un JSON válido.';
                        exit;
                    }

                    if (is_array($productsArray)) {
                        $matchingProducts = [];


                        foreach ($productsArray as $product) {
                            if (stripos($product["name"], $searchTerm) !== false) {
                                $matchingProducts[] = $product;
                            }
                        }

                        if (empty($matchingProducts)) {
                            echo 'The term was not found.';
                        } else {;
                            echo '<ul>';
                            foreach ($matchingProducts as $product) {
                                echo '<li>';
                                echo '<div class="item">';
                                echo '<figure>';
                                echo '<img src="' . $product["image"] . '" alt="' . $product["name"] . '">';
                                echo '</figure>';
                                echo '<div class="info-product">';
                                echo '<h2>' . $product["name"] . '</h2>';
                                echo '<p class="price">' . $product["price"] . '</p>';
                                echo $product["add_to_cart"];
                                echo '</div>';
                                echo '</div>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                    } else {
                        echo 'Error: El archivo de productos no es un JSON válido.';
                    }
                } else {
                    echo 'Error: El archivo de productos no existe.';
                }
            }
            ?>

        </div>
        <footer class="footer">

            <div class="container container-footer">
                <section class="container footer" id="contactos"></section>
                <div class="menu-footer">
                    <div class="contact-info">
                        <p class="title-footer">Información de Contacto</p>
                        <ul>
                            <li>
                                Dirección: av.bolivar edif.Libertad local 18 Caracas Venezuela
                            </li>
                            <li>Teléfonos: 0412-705-13</li>
                            <li>Fax: 55555300</li>
                            <li>EmaiL: josegvieira0102@gmail.com</li>
                        </ul>
                        <div class="social-icons">
                            <span class="facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </span>
                            <span class="twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </span>
                            <span class="youtube">
                                <i class="fa-brands fa-youtube"></i>
                            </span>
                            <span class="pinterest">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </span>
                            <span class="instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </span>
                        </div>
                    </div>

                    <div class="information">
                        <p class="title-footer">Información</p>
                        <ul>
                            <li><a href="#">Acerca de Nosotros</a></li>
                            <li><a href="#">Información Delivery</a></li>
                            <li><a href="#">Politicas de Privacidad</a></li>
                            <li><a href="#">Términos y condiciones</a></li>
                            <li><a href="#">Contactános</a></li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>
                        Desarrollado por Jean Franco Kusniar y Gabriel Vieira para el mundo &copy; 2024
                    </p>
                </div>
            </div>
        </footer>

        <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
        <script src="index.js"></script>

</body>

</html>