<?php
try {
    // Incluir la conexión a la base de datos
    include_once "../configuracion/conexion.php";
    
    $evento = $_POST["evento"];
    $fecha_evento = $_POST["fecha_evento"];
    
    // Verificar si el archivo se ha subido
    if (isset($_FILES['imagen'])) {
        $imagen = $_FILES['imagen']['name'];
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $directorio = '../../../imagenes/';
        
        // Crear el directorio si no existe
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        
        // Mover el archivo subido
        if (move_uploaded_file($tmp_name, $directorio . $imagen)) {
            // Preparar la sentencia SQL
            $sentencia = $base_de_datos->prepare("INSERT INTO publicacion (imagen, evento, fecha_evento) 
                VALUES (?, ?, ?);");
    
            // Ejecutar la sentencia con los datos proporcionados
            $resultado = $sentencia->execute([$imagen, $evento, $fecha_evento]);
            
            if ($resultado === TRUE) {
                echo "Cambios Guardados";
            } else {
                echo "Algo salió mal. Por favor, verifica que la tabla exista.";
            }
        } else {
            echo "Error al mover el archivo. Verifica los permisos del directorio.";
        }
    } else {
        echo "No se ha subido ninguna imagen.";
    }
}
catch (PDOException $e) {
    // Capturar y mostrar cualquier error que ocurra
    echo "Error: " . $e->getMessage();
}
?>
