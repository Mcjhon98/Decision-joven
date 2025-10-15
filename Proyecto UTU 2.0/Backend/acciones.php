<?php
// Recibir datos del formulario
$nombre = htmlspecialchars($_POST["nombre"] ?? "Desconocido");
$cedula = htmlspecialchars($_POST["cedula"] ?? "Sin Documneto");;
$celular = htmlspecialchars($_POST["celular"] ?? "Sin Número telefonico");;
$dep = (int) ($_POST["departamento"] ?? 0);

// Conectar a MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db   = "descision_joven_base";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si ya existe la cédula (para evitar duplicados)
$check = $conn->prepare("SELECT documento FROM register WHERE documento = ?");
$check->bind_param("i", $cedula);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    // Ya existe esa cédula, volver al formulario
    $check->close();
    $conn->close();
    header("Location:http://localhost/Proyecto%20UTU/Html/Registro.html");
    exit;
}

// Insertar datos
$stmt = $conn->prepare("INSERT INTO register (nombre, documento, telefono, id_departamento) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nombre, $cedula, $celular, $dep);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirigir de nuevo al formulario
header("Location:http://localhost/Proyecto%20UTU/Html/Registro.html");
exit;
?>
