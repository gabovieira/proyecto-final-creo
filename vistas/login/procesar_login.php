<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo_login = $_POST["correo_login"];
    $clave_login = $_POST["clave_login"];

    // Validar la información comparándola con el contenido del archivo
    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
    $usuario_encontrado = false;

    foreach ($usuarios as $usuario) {
        list($nombre, $correo, $clave) = explode("|", $usuario);
        if ($correo == $correo_login && $clave == $clave_login) {
            $usuario_encontrado = true;
            echo '<script> alert("Bienvenido de nuevo");
            window.location="../../index.php" </script>';
            exit;
        }
    }

    // Si llegamos aquí, el usuario no fue encontrado o la contraseña es incorrecta
    $_SESSION['error_message'] = 'Error: Usuario no encontrado o contraseña incorrecta.';
    echo '<script> alert(" usuario o contraseña incorrecta, intente de nuevo");
     window.location="login.php" </script>';
    exit;
}

// Si llegamos a este punto, es porque algo salió mal
$_SESSION['error_message'] = 'Error inesperado. Por favor, inténtelo de nuevo más tarde.';
echo '<script> alert(" error inesperado intente de nuevo");
    window.location="login.php" </script>';
exit;
