<?php
require_once __DIR__ . '/../negocio/NegocioUsuario.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? 'Anónimo'));
    $cedula = htmlspecialchars(trim($_POST['cedula'] ?? 'Desconocido'));
    $testimonio = htmlspecialchars(trim($_POST['testimonio'] ?? ''));
    $edad = htmlspecialchars(trim($_POST['edad'] ?? 'Anónimo'));
    $dep = (int) ($_POST['departamento'] ?? 0);

    try {
        $negocioUsuario = new NegocioUsuario();
        $negocioUsuario->registrarUsuario($nombre, $cedula, $testimonio, $edad, $dep);

        // Redirige correctamente a la página de testimonios
        header("Location: ../../Html/testimonio.php?success=1");
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    http_response_code(405);
    echo "Método no permitido.";
}
