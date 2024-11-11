<?php
require_once 'login.php';
$con = new mysqli($hn, $un, $pw, $db);

// Verifica si la conexión es exitosa
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

// Obtén y limpia los datos del formulario
$nombre = $con->real_escape_string($_POST['nombre']);
$apellido = $con->real_escape_string($_POST['apellido']);
$email = $con->real_escape_string($_POST['email']);
$telefono = $con->real_escape_string($_POST['telefono']);
$comentario = $con->real_escape_string($_POST['comentario']);

// Consulta para insertar datos
$query = "INSERT INTO consultas (nombre, apellido, email, telefono, comentario) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$comentario')";

// Ejecuta la consulta y verifica si fue exitosa
if ($con->query($query) === TRUE) {
    // Redirige al usuario a una página de éxito o a la misma página del formulario con un mensaje de éxito
    header("Location: index.html");
    exit();
} else {
    // Muestra un mensaje de error
    echo "Error: " . $query . "<br>" . $con->error;
}

// Cierra la conexión
$con->close();

?>