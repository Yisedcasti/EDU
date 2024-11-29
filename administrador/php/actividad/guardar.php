<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_actividad = $_POST['nom_actividad'];
    $descrip_actividad = $_POST['descrip_actividad'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $codigo_logro = $_POST['codigo_logro'];

    try {
        // Primero consultamos el 'materia_id_materia' desde la tabla 'logro'
        $consultar = $base_de_datos->prepare("SELECT id_materia FROM logro WHERE codigo_logro = ?");
        $consultar->execute([$codigo_logro]);
        $resultado = $consultar->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            exit("No se encontró información para este logro.");
        }

        // Guardamos el 'materia_id_materia'
        $id_materia = $resultado['id_materia'];

        // Preparamos la sentencia SQL para insertar en la tabla 'actividad'
        $sql = "INSERT INTO actividad (nom_actividad, descrip_actividad, fecha_entrega, logro_codigo_logro, logro_materia_id_materia) 
                VALUES (:nom_actividad, :descrip_actividad, :fecha_entrega, :codigo_logro, :id_materia)";
        
        $stmt = $base_de_datos->prepare($sql);

        // Ejecutamos la inserción
        $stmt->execute([
            ':nom_actividad' => $nom_actividad,
            ':descrip_actividad' => $descrip_actividad,
            ':fecha_entrega' => $fecha_entrega,
            ':codigo_logro' => $codigo_logro,
            ':id_materia' => $id_materia
        ]);

        // Redirigir o mostrar un mensaje de éxito
        echo "Actividad guardada correctamente";
        header("Location: actividad.php");

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>
