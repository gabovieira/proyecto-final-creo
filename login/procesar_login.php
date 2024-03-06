<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo_login = $_POST["correo_login"];
    $clave_login = $_POST["clave_login"];

    // Validar la información comparándola con el contenido del archivo
    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
    $usuario_encontrado = false;

    foreach ($usuarios as $usuario) {
        list($nombre, $correo, $clave) = explode("|", $usuario);
        if ($correo == $correo_login && password_verify($clave_login, $clave)) {
            $usuario_encontrado = true;
            echo "<script>alert('¡Bienvenido de nuevo, $nombre!');</script>";
            header("Location: ../index.html");
            exit;
        }
    }

    if (!$usuario_encontrado) {
        echo "<script>alert('Error: Usuario no encontrado o contraseña incorrecta.');</script>";
        header("Location: login.php");
        exit;
    }
}
?>

