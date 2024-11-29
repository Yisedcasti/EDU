<?php
include_once "../configuracion/conexion.php";

// Realiza la consulta a la base de datos
try {
    $sentencia = $base_de_datos->prepare("
        SELECT registro.num_doc, registro.nombre, registro.apellido, rol.rol, jornada.jornada
        FROM registro
        INNER JOIN rol ON registro.id_rol = rol.id_rol 
        INNER JOIN jornada ON registro.id_jornada = jornada.id_jornada
        WHERE rol.rol = 'Coordinador'
    ");
    $sentencia->execute();
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
