<?php
try {
    // Incluir la conexión a la base de datos
    include_once "../configuracion/conexion.php";
    
    // Obtener los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_jornada = $_POST["id_jornada"];
        $jornada = $_POST["jornada"];
        $hora_inicio = $_POST["hora_inicio"];
        $hora_final = $_POST["hora_final"];

        
        // Preparar la consulta SQL para actualizar los datos
        $sentencia = $base_de_datos->prepare("
            UPDATE jornada 
            SET jornada = ?, hora_inicio = ?, hora_final = ? 
            WHERE id_jornada = ?");
        $resultado = $sentencia->execute([$jornada, $hora_inicio, $hora_final, $id_jornada]);

        if ($resultado === TRUE) {
            echo "Cambios Guardados";
        } else {
            echo "Algo salió mal. Por favor, verifica que la tabla exista.";
        }
    }
} catch (PDOException $e) {
    // Capturar y mostrar cualquier error que ocurra
    echo "Error: " . $e->getMessage();
}

