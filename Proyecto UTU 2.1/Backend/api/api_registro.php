<?php
require_once __DIR__ . '/../negocio/Negocioregistro.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? 'Desconocido'));
    $cedula = htmlspecialchars(trim($_POST['cedula'] ?? 'Sin Documento'));
    $celular = htmlspecialchars(trim($_POST['celular'] ?? 'Sin Número telefonico'));
    $dep = (int) ($_POST['departamento'] ?? 0);
}

$negocioregistro = new Negocioregistro();
$result = $negocioregistro->registrarUsuario($nombre, $cedula, $celular, $dep);

if ($result) {
    header("Location: http://localhost/Proyecto%20UTU/Html/registro.html?status=success");
    exit;
} else {
    echo "Error al registrar el usuario.";
    exit;
}
