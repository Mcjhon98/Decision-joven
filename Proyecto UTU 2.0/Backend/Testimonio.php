<?php
$nombre = htmlspecialchars($_POST['nombre'] ?? 'Desconocido');
$documento = htmlspecialchars($_POST['cedula'] ?? 'Desconocido');
$testimonio = htmlspecialchars($_POST['testimonio'] ?? 'Sin Testimonio');

if (!$nombre || !$documento || !$testimonio) {
    header("Location:http://localhost/Proyecto%20UTU/Html/testimonio.html");
    exit;
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "descision_joven_base";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO testimonios (nombre, documento, testimonio) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $documento, $testimonio);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location:http://localhost/Proyecto%20UTU/Html/testimonio.html");
exit;
?>
