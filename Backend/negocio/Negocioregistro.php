<?php
require_once __DIR__ . '/../persistencia/PersistenciaRegistro.php';

class Negocioregistro {
    private $persistencia;

    public function __construct() {
        $this->persistencia = new PersistenciaRegistro();
    }

    public function registrarUsuario($nombre, $cedula, $celular, $dep) {
        // Validaciones simples
        if (empty($nombre) || empty($cedula) || empty($celular) || $dep <= 0) {
            throw new Exception("Todos los campos son obligatorios.");
        }
        // Registrar en la base de datos
        return $this->persistencia->insertar($nombre, $cedula, $celular, $dep);
    }
}
