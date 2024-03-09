<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de pagina de ropa</title>
    <link rel="stylesheet" href="loginestilo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="container-form register">
    <div class="information">
        <div class="info-childs">
            <h2>Bienvenido</h2>
            <p>Gracias por unirte a nuestra tienda</p>
            <input type="button" value="iniciar sesion" id="Sing-in">
        </div>
    </div>
    <div class="form-information">
        <div class="form-information-childs">
            <h2>Crear una cuenta</h2>
            <p>Usa tu email para registrate</p>
            <form class="form" method="post" action="procesar_registro.php">
                <label>
                    <i class='bx bx-user' ></i>
                    <input type="text" placeholder="Nombre completo" id="usuario" name="usuario">
                </label>
                <label>
                    <i class='bx bx-envelope'></i>
                    <input type="email" placeholder="Correo electronico" id="correo" name="correo">
                </label>
                <label>
                    <i class='bx bxs-lock' ></i>
                    <input type="password" placeholder="Contraseña" id="clave" name="clave">
                </label>
                <input type="submit" value="Registrarse">
            </form>
        </div>
    </div>
</div>

<div class="container-form login hide" >
    <div class="information">
        <div class="info-childs">
            <h2>Bienvenido nuevamente</h2>
            <p>Gracias por querer unirte a nuestra familia KB shop esperamos que te registres con exito</p>
            <input type="button" value="Registrarse" id="Sing-up">
        </div>
    </div>
    <div class="form-information">
        <div class="form-information-childs">
            <h2>Iniciar sesion</h2>
            <p>O iniciar sesion con una cuenta</p>
            <form class="form" method="post" action="procesar_login.php">
                <label>
                    <i class='bx bx-envelope'></i>
                    <input type="email" placeholder="Correo electronico" name="correo_login">
                </label>
                <label>
                    <i class='bx bxs-lock' ></i>
                    <input type="password" placeholder="Contraseña" name="clave_login">
                </label>
                <input type="submit" value="Iniciar sesion">
            </form>
        </div>
    </div>
</div>
<script src="Login.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var singInButton = document.getElementById('Sing-in');
        var singUpButton = document.getElementById('Sing-up');
        var usuarioInput = document.getElementById('usuario');
        var correoInput = document.getElementById('correo');
        var claveInput = document.getElementById('clave');

        // Limpiar campos al hacer clic en "Iniciar sesión"
        singInButton.addEventListener('click', function () {
            usuarioInput.value = '';
            correoInput.value = '';
            claveInput.value = '';
        });

        // Limpiar campos al hacer clic en "Registrarse"
        singUpButton.addEventListener('click', function () {
            correoInput.value = '';
            claveInput.value = '';
        });
    });
</script>
</body>
</html>
