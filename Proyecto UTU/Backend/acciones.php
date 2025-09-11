<?php
$conexion = mysqli_connect("localhost", "root", "", "mi_juego");

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion == "agregar") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $sql = "INSERT INTO jugadores (nombre, edad) VALUES ('$nombre', $edad)";
    echo mysqli_query($conexion, $sql) ? "Jugador agregado 🎉" : "Error: " . mysqli_error($conexion);

} elseif ($accion == "eliminar") {
    $id = $_GET['id'];
    $sql = "DELETE FROM jugadores WHERE id=$id";
    echo mysqli_query($conexion, $sql) ? "Jugador eliminado ✅" : "Error: " . mysqli_error($conexion);

} elseif ($accion == "listar") {
    $resultado = mysqli_query($conexion, "SELECT * FROM jugadores");
    $jugadores = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $jugadores[] = $fila;
    }
    echo json_encode($jugadores);
}
?>
