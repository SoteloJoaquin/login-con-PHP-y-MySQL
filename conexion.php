<?php
$servidor = "localhost";
$usuario = "root"; // Cambia esto según tu configuración
$contrasena = ""; // Cambia esto según tu configuración
$base_datos = "mi_base_datos";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
