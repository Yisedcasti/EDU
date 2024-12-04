<?php
try {
    // Incluir la conexión a la base de datos
    include_once "../configuracion/conexion.php";
    
    $informacion = $_POST["informacion"];
    $titulo = $_POST["titulo"];
    $registro_num_doc = $_POST["registro_num_doc"];

    // Preparar la sentencia SQL
    $sentencia = $base_de_datos->prepare("INSERT INTO public_noticias(titulo, info, registro_num_doc) 
        VALUES (?, ?, ?);");
    
    // Ejecutar la sentencia con los datos proporcionados
    $resultado = $sentencia->execute([$titulo, $informacion, $registro_num_doc]);

    if ($resultado === TRUE) {
        // Mostrar mensaje de éxito y redirigir
        echo "<script>
                alert('Cambios guardados exitosamente.');
                window.location.href = '../vistas/publicaciones_crear.php';
              </script>";
    } else {
        // Mostrar mensaje de error y redirigir
        echo "<script>
                alert('Algo salió mal. Por favor, verifica que la tabla exista.');
                window.location.href = '../vistas/publicaciones_crear.php';
              </script>";
    }
} catch (PDOException $e) {
    // Capturar y mostrar cualquier error en una alerta
    echo "<script>
            alert('Error: " . $e->getMessage() . "');
            window.location.href = '../vistas/publicaciones_crear.php';
          </script>";
}
?>
