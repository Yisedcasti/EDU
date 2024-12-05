<?php
require_once 'config/config.php';
class Usuario {
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function cargarRoles() {
        $sql = "SELECT id_rol, rol FROM rol";  
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    
        return $roles;  // Devuelves el arreglo de roles
    }
    

   public function registrar($data){
            try{
                $this->db->beginTransaction();  // Inicia la transacción

                // La consulta SQL de inserción
                $sql = "INSERT INTO registro (num_doc, tipo_doc, nombres, apellidos, celular, telefono, direccion, correo, pass, rol_id_rol, jornada_id_jornada) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?)";
                $stmt = $this->db->prepare($sql);

                // Ejecuta la inserción
                $stmt->execute([
                    $data['num_doc'],
                    $data['tipo_doc'],
                    $data['nombre'],
                    $data['apellido'],
                    $data['celular'],
                    $data['telefono'],
                    $data['direccion'],
                    $data['correo'],
                    $data['pass'],
                    $data['id_rol'],
                    $data['jornada_id_jornada']
                ]);

                $this->db->commit();  // Commit para confirmar la transacción
                return json_encode(['message' => 'Usuario registrado']);
            } catch (PDOException $e) {
                $this->db->rollBack();  // Rollback en caso de error
                return json_encode(['message' => 'Error al registrar: ' . $e->getMessage()]);
            }
        }

    
        public function inicioSesion($data) {
            $num_doc = $data['num_doc'];
            $pass = $data['pass'];
    
            $query = "SELECT * FROM registro WHERE num_doc = :num_doc";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':num_doc', $num_doc, PDO::PARAM_STR);
            $stmt->execute();
            
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($usuario) {
                if (password_verify($pass, $usuario['pass'])) {
                    return [
                        'nombres' => $usuario['nombres'], 
                        'apellidos' => $usuario['apellidos'], 
                        'num_doc' => $usuario['num_doc'], 
                        'rol_id_rol' => $usuario['rol_id_rol'], 
                    ];
                } else {
                    return false;
                }
            }
    
            return false;
        }


}


?>