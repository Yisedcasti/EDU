<?php
require_once 'modelo/usuario.php';

class UsuarioControlador {

    private $db;
    private $usuario;

    public function __construct(){
        $database = new DataBase();
        $this->db = $database->getConnection();
    } 

    public function registrar($data){

        $this->usuario = new Usuario($this->db);    
        $data = [
            'num_doc' => $data['num_doc'],
            'pass' => password_hash($data['pass'], PASSWORD_BCRYPT),
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'celular' => $data['celular'],
            'tipo_doc' => $data['tipo_doc'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'correo' => $data['correo'],
            'id_rol' => $data['id_rol'],
            'jornada_id_jornada' => $data['jornada_id_jornada'],
        ];
        $respuesta = $this->usuario->registrar($data);
        echo json_encode(['message' => $respuesta]);
    }

    public function inicioSesion($data){
        if (empty($data['num_doc']) || empty($data['pass'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos de credenciales']);
            return;
        }
        $this->usuario = new Usuario($this->db);
        $data = [
            'num_doc' => $data['num_doc'],
            'pass' => $data['pass'],
        ];
        $respuesta = $this->usuario->inicioSesion($data);
        if ($respuesta) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Credenciales correctas',
                'data' => $respuesta
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Credenciales incorrectas'
            ]);
        }
    }

    public function cargarRoles() {
        $this->usuario = new Usuario($this->db);
        $roles = $this->usuario->cargarRoles();  // Llamamos al modelo para obtener los roles
    
        if ($roles) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Roles cargados',
                'data' => $roles  // Devuelves los roles aquí
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No se pudieron cargar los roles'
            ]);
        }
    }
    
}
?>
