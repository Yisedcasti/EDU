<?php
$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: application/json");

require_once 'controlador/usuarioControlador.php';

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['action'])) {
            $action = $data['action'];
            switch ($action) {
                case 'registrarse':
                    $usuarioControlador = new UsuarioControlador();
                    $usuarioControlador->registrar($data);
                    break;
                case 'Iniciar':
                    $usuarioControlador = new UsuarioControlador();
                    $usuarioControlador->inicioSesion($data);
                    break;
                    
                default:
                    http_response_code(400);
                    echo json_encode(['message' => 'Acción no encontrada']);
                    exit(); 
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Acción no encontrada']);
            exit(); 
        }
        break; 

    case 'GET':
        $data = $_GET; 
        if (isset($data['action'])) {
            $action = $data['action'];
            switch ($action) {
                case 'cargarRoles':
                    $usuarioControlador = new UsuarioControlador();
                    $usuarioControlador->cargarRoles();
                    break;

                default:
                    http_response_code(400);
                    echo json_encode(['message' => 'Acción no encontrada']);
                    exit(); 
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Acción no encontrada']);
            exit(); 
        }
        break; 

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Método de solicitud no soportado']);
        exit();
}
?>
