<?php
include_once "conexion.php";

// Realiza la consulta a la base de datos
try {
    $sentencia = $base_de_datos->prepare("
       SELECT asistencia.*, registro.*
           FROM asistencia 
            INNER JOIN registro ON asistencia.registro_num_doc = registro.num_doc

    ");
    $sentencia->execute();
    $asistencias = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $registros = $base_de_datos->query("SELECT * FROM registro where id_rol= 4")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>