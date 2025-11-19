<?php
require_once __DIR__ . '/../negocio/Negocioregistro.php';

class Persistenciaregistro {
    private $conn;

    public function __construct() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "descision_joven_base";
        $this->conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_error) {
            die("Error de conexión a la DB: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
        }
    }

    public function insertar($nombre, $cedula, $celular, $dep) {
        // Verificar si ya existe la cédula (para evitar duplicados)
        $check = $this->conn->prepare("SELECT documento FROM register WHERE documento = ?");
        if (!$check) {
            throw new Exception("Error preparando la verificación de cédula: " . $this->conn->error);
        }

        $check->bind_param("s", $cedula); // Se usa "s" porque la cédula es un string
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $check->close();
            // Puedes retornar false o lanzar una excepción, según cómo manejes errores
            throw new Exception("La cédula ya está registrada.");
        }
        $check->close();

        // Insertar nuevo registro
        $stmt = $this->conn->prepare("INSERT INTO register (nombre, documento, telefono, id_departamento) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Error preparando la consulta SQL: " . $this->conn->error);
        }

        $stmt->bind_param("sssi", $nombre, $cedula, $celular, $dep);
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }

        $stmt->close();
        return true;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
