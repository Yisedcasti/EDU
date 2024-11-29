<?php
include "Conexion.php"; 
$sentencia = $base_de_datos->query('SELECT * FROM cursos;');
$curso = $sentencia->fetchAll(PDO::FETCH_OBJ);

// Realiza la consulta a la base de datos
try {
    $sentencia = $base_de_datos->prepare("
       SELECT cursos.*, grado.*
           FROM cursos
            INNER JOIN grado ON cursos.grado_id_grado = grado.id_grado
            ORDER BY grado.grado ASC, cursos.curso ASC;
    ");
    $sentencia->execute();
    $cursos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $grados = $base_de_datos->query("SELECT * FROM grado")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

?>