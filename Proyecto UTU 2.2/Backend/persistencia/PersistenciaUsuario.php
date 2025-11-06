<?php
class PersistenciaUsuario {
    private $conn;

    public function __construct() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "descision_joven_base";

        $this->conn = new mysqli($host, $user, $pass, $db);

        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
    }

    public function insertar($nombre, $cedula, $testimonio, $edad, $imgUrl ,$dep) {
        $stmt = $this->conn->prepare("
            INSERT INTO testimonios (nombre, documento, testimonio, edad, imgurl, id_departamento)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        if (!$stmt) {
            throw new Exception("Error preparando la consulta SQL: " . $this->conn->error);
        }

        $stmt->bind_param("sssssi", $nombre, $cedula, $testimonio, $edad, $imgUrl,$dep);

        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }

        $stmt->close();
    }

    public function obtenerTestimonios() {
        $sql = "
            SELECT t.nombre, t.documento, t.testimonio, t.edad, t.imgurl , d.nombre AS nombre_departamento
            FROM testimonios t
            LEFT JOIN departamentos_uy d ON t.id_departamento = d.id_departamento
            ORDER BY t.id DESC
        ";

        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Error al obtener los testimonios: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct() {
        $this->conn->close();
    }
}
