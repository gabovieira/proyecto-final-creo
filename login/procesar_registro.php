<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    // Verificar si el correo ya está registrado
    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
    foreach ($usuarios as $usuario_existente) {
        list(, $correo_existente, ) = explode("|", $usuario_existente);
        if ($correo == $correo_existente) {
            echo "Error: El correo electrónico ya está registrado.";
            exit(); // Terminar la ejecución del script
        }
    }

    // Validar y guardar la información en un archivo
    if (!empty($usuario) && !empty($correo) && !empty($clave)) {
        $datos_usuario = "$usuario|$correo|$clave\n";
        file_put_contents('usuarios.txt', $datos_usuario, FILE_APPEND);
        echo "Registro exitoso. ¡Bienvenido, $usuario!";
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}
?>
