<?php
require_once ("conexion.php");

class TareasDB {
    private $db;

    public function __construct() {
        $this->db = new Conexion();
    }

    public function obtenerUsuarioPorId($userId) {
        $query = "SELECT * FROM registro WHERE num_doc = ?";
    
        $stmt = $this->db->mysqli->prepare($query);
        if ($stmt === false) {
            throw new Exception("Error al preparar la consulta: " . $this->db->mysqli->error);
        }

        $stmt->bind_param("i", $userId);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;  
        }
        if($stmt){
        $stmt->close();
        }
    }

    public function logeo($user, $pass) {
        $stmt = $this->db->mysqli->prepare("SELECT * FROM registro WHERE num_doc = ?");
        if (!$stmt) {
            die("Error en la consulta SQL: " . $this->db->mysqli->error);
        }

        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        $stmt->close();

        if (!$usuario) {
            return false;
        }

        if (password_verify($pass, $usuario['contraseña'])) {
            $_SESSION['userId'] = $usuario['num_doc'];
            $_SESSION['user'] = $usuario['nombres'];
            $_SESSION['usera'] = $usuario['apellidos'];
            $_SESSION['rol'] = $usuario['rol_id_rol'];
            return true;
        }

        return false;
    }

    public function credencial() {
        if (isset($_SESSION['userId'])) {
            return true; // Si la sesión está activa, retorna true
        } else {
            header("Location: login.php");
            exit;
        }
    }
}
?>
