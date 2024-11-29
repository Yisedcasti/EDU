<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_asistencia = $_POST['fecha_asistencia'];
    $asistencia = $_POST['asistencia'];
    $registro_num_doc = $_POST['registro_num_doc'];

    try {
        $consultar = $base_de_datos->prepare("SELECT id_rol, id_jornada FROM registro WHERE num_doc = ?");
        $consultar->execute([$registro_num_doc]);
        $resultado = $consultar->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            exit("No se encontró información para esta asistencia.");
        }

        $id_rol = $resultado['id_rol'];
        $id_jornada = $resultado['id_jornada']; 

        $sql = "INSERT INTO asistencia (fecha_asistencia, asistencia, registro_num_doc, registro_rol_id_rol, registro_jornada_id_jornada) 
                VALUES (:fecha_asistencia, :asistencia, :registro_num_doc, :registro_rol_id_rol, :registro_jornada_id_jornada)";
        
        $stmt = $base_de_datos->prepare($sql);

        $stmt->execute([
            ':fecha_asistencia' => $fecha_asistencia,
            ':asistencia' => $asistencia,
            ':registro_num_doc' => $registro_num_doc,
            ':registro_rol_id_rol' => $id_rol,
            ':registro_jornada_id_jornada' => $id_jornada
        ]);

        echo "Asistencia guardada correctamente";
        header("Location: asistencia.php");

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>