<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar y ejecutar la consulta de selección
    $sql = $conn->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows == 1) {
        $sql->bind_result($contrasena_hash);
        $sql->fetch();

        // Verificar la contraseña
        if (password_verify($contrasena, $contrasena_hash)) {
            echo "Inicio de sesión exitoso.";
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $sql->close();
}

$conn->close();
?>

<form method="post" action="">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" value="Iniciar sesión">
</form>
