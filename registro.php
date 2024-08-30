<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    // Encriptar la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Preparar y ejecutar la consulta de inserción
    $sql = $conn->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
    $sql->bind_param("ss", $usuario, $contrasena_hash);

    if ($sql->execute()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
}

$conn->close();
?>

<form method="post" action="">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" value="Registrar">
</form>
