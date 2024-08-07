<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bddatos = "proyecto";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $clave, $bddatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>