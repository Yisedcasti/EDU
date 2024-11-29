<?php
require_once 'TareasDB.php';

class TareasAPI {

    public function API() {
        header("Content-Type: application/json");
        $method = $_SERVER['REQUEST_METHOD'];

        switch($method) {
            case 'POST':
                if (isset($_POST['action'])) {
                    if ($_POST['action'] == 'logeo') {
                        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
                        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

                        $tareasDB = new TareasDB();
                        $resultado = $tareasDB->logeo($user, $pass);
                        
                        if ($resultado) {
                            $this->response(200, "success", "Login successful.");
                        } else {
                            $this->response(400, "error", "Invalid credentials.");
                        }
                    }
                }
                break;
        }
    }

    function response($code = 200, $status = "", $message = "") {
        http_response_code($code);
        if (!empty($status) && !empty($message)) {
            $response = array(
                "status" => $status,
                "message" => $message
            );
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}

?>
