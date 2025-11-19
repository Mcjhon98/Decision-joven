<?php
require_once __DIR__ . '/../persistencia/PersistenciaUsuario.php';

class NegocioUsuario {
    private $persistencia;
    
    const DEFAULT_AVATAR = '../Imagenes/avatar.png';
    const DEFAULT_NOMBRE = 'Anónimo';
    const DEFAULT_CEDULA = 'Sin Documento';
    const DEFAULT_EDAD = 'N/A';

    public function __construct() {
        $this->persistencia = new PersistenciaUsuario();
    }

    public function registrarUsuario($nombre, $cedula, $testimonio, $edad, $imgUrl, $dep) {
        $nombre = empty($nombre) ? self::DEFAULT_NOMBRE : $nombre;
        $cedula = empty($cedula) ? self::DEFAULT_CEDULA : $cedula;
        $edad = empty($edad) ? self::DEFAULT_EDAD : $edad;
        $imgUrl = empty($imgUrl) ? self::DEFAULT_AVATAR : $imgUrl;
        
        if (empty($testimonio)) {
            throw new Exception("El campo de testimonio no puede estar vacío.");
        }
        $this->persistencia->insertar($nombre, $cedula, $testimonio, $edad, $imgUrl, $dep);
    }
    
    public function obtenerTestimonios() {
        return $this->persistencia->obtenerTestimonios();
    }
}
