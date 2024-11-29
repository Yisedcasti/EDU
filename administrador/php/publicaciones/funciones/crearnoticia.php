<?php
try {
    // Incluir la conexión a la base de datos
    include_once "../configuracion/conexion.php";
    
    $informacion = $_POST["informacion"];
    $titulo= $_POST["titulo"];
    $escritoPor = $_POST["escritoPor"];

    // Preparar la sentencia SQL
    $sentencia = $base_de_datos->prepare("INSERT INTO publicacion ( informacion	, titulo, escritoPor) 
        VALUES (?, ?, ?);");
    
    // Ejecutar la sentencia con los datos proporcionados
    $resultado = $sentencia->execute([ $informacion, $titulo, $escritoPor]);

    if ($resultado === TRUE) {
        echo "Cambios Guardados";
    } else {
        echo "Algo salió mal. Por favor, verifica que la tabla exista.";
    }
}
catch (PDOException $e) {
    // Capturar y mostrar cualquier error que ocurra
    echo "Error: " . $e->getMessage();
}
?>
