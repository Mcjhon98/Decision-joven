<?php
require_once __DIR__ . '/../negocio/NegocioUsuario.php';

try {
    $negocioUsuario = new NegocioUsuario();
    $testimonios = $negocioUsuario->obtenerTestimonios();
} catch (Exception $e) {
    $error = $e->getMessage();
    $testimonios = [];
}
