<?php
require_once __DIR__ . '/../persistencia/PersistenciaUsuario.php';

class NegocioUsuario {
    private $persistencia;

    public function __construct() {
        $this->persistencia = new PersistenciaUsuario();
    }

    public function registrarUsuario($nombre, $cedula, $testimonio, $edad, $dep) {
        if (empty($testimonio)) {
            throw new Exception("El campo de testimonio no puede estar vacío.");
        }

        $this->persistencia->insertar($nombre, $cedula, $testimonio, $edad, $dep);
    }
    public function obtenerTestimonios() {
        return $this->persistencia->obtenerTestimonios();
    }
}
