<?php
// Verificar si 'num_doc' está presente en el POST
if (!isset($_POST["num_doc"])) {
    echo '
    <script>
    alert("No se ha recibido el documento del usuario.");
    window.location.href = "registroeliminar.php";
    </script>
    ';
    exit();
}

$num_doc = $_POST["num_doc"];

// Incluir la conexión a la base de datos
include_once "../configuracion/conexion.php";

try {
    // Eliminar primero en la tabla 'asignacion'
    $asignacion = $base_de_datos->prepare("DELETE FROM asignacion WHERE registro_num_doc = ?;");
    $resultadoasig = $asignacion->execute([$num_doc]);

    // Eliminar en la tabla 'registro'
    $sentencia = $base_de_datos->prepare("DELETE FROM registro WHERE num_doc = ?;");
    $resultado = $sentencia->execute([$num_doc]);

    // Verificar si ambas consultas fueron exitosas
    if ($resultado && $resultadoasig) {
        echo '
        <script>
        alert("El usuario ha sido eliminado correctamente.");
        window.location.href = "registroeliminar.php";
        </script>
        ';
    } else {
        echo '
        <script>
        alert("El usuario NO ha sido eliminado.");
        window.location.href = "registroeliminar.php";
        </script>
        ';
    }
} catch (PDOException $e) {
    echo '
    <script>
    alert("Error al eliminar el usuario: ' . $e->getMessage() . '");
    window.location.href = "registroeliminar.php";
    </script>
    ';
}
?>
