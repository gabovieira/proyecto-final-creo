<?php
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
            echo "<script>alert('usted inicio seccion con!');</script>";
        }
        header("Location: ../index.html");
        exit;
    }


    if (!$usuario_encontrado) {
        echo "Error: Usuario no encontrado o contraseña incorrecta.";
        header("Location: login.php");
        exit;
    }
}
