<?php
include_once "../configuracion/conexion.php";

// Realiza la consulta a la base de datos
try {
    $sentencia = $base_de_datos->prepare(" SELECT * FROM publicacion");
    $sentencia->execute();
    $publicaciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
