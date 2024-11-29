<?php
try {
    // Incluir la conexión a la base de datos
    include_once "../configuracion/conexion.php";
    
    // Obtener los valores del formulario
    $id = $_POST["id"];
    $evento = $_POST["evento"];
    $fecha_evento = $_POST["fecha_evento"];
    
    // Verificar si se ha subido una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['name'];
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $directorio = 'imagenes/';
        
        // Crear el directorio si no existe
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        
        // Mover el archivo subido
        if (move_uploaded_file($tmp_name, $directorio . $imagen)) {
            // Preparar la sentencia SQL para actualizar
            $sentencia = $base_de_datos->prepare("UPDATE publicacion SET imagen = ?, evento = ?, fecha_evento = ? WHERE id = ?");
            
            // Ejecutar la sentencia con los datos proporcionados
            $resultado = $sentencia->execute([$imagen, $evento, $fecha_evento, $id]);
        } else {
            echo "Error al mover el archivo. Verifica los permisos del directorio.";
        }
    } else {
        // Si no se subió una nueva imagen, solo actualizamos evento y fecha
        $sentencia = $base_de_datos->prepare("UPDATE publicacion SET evento = ?, fecha_evento = ? WHERE id = ?");
        $resultado = $sentencia->execute([$evento, $fecha_evento, $id]);
    }

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
