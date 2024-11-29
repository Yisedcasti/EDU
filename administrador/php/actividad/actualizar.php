<?php
try {
    // Incluir la conexión a la base de datos
    include_once "conexion.php";
    
    // Verificar si los datos fueron enviados por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir los datos del formulario
        $id_actividad = $_POST['id_actividad'];
        $nom_actividad = $_POST['nom_actividad'];
        $descrip_actividad = $_POST['descrip_actividad'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $codigo_logro = $_POST['codigo_logro'];

        // Primera consulta: actualizar la tabla nota
        $logro = $base_de_datos->prepare("
            UPDATE nota
            SET actividad_logro_Codigo_logro = ?
            WHERE id_actividad = ?");
        $resultadologro = $logro->execute([$codigo_logro, $id_actividad]);

        // Segunda consulta: actualizar la tabla actividad
        $sentencia = $base_de_datos->prepare("
            UPDATE actividad
            SET nom_actividad = ?, descrip_actividad = ?, fecha_entrega = ?, logro_Codigo_logro = ?
            WHERE id_actividad = ?");
        $resultado = $sentencia->execute([$nom_actividad, $descrip_actividad, $fecha_entrega, $codigo_logro, $id_actividad]);

        // Verificar si ambas consultas fueron exitosas
        if ($resultado && $resultadologro) {
            // Redirigir solo si todo salió bien
            header("Location: actividad.php");
            exit(); // Asegurarse de que el script no siga ejecutándose después de la redirección
        } else {
            // Si algo salió mal, mostrar mensaje de error
            echo "Error al actualizar la actividad o el logro. Verifica los datos e intenta nuevamente.";
        }
    }
} catch (PDOException $e) {
    // Capturar y mostrar cualquier error de la base de datos
    echo "Error en la base de datos: " . $e->getMessage();
}
?>
