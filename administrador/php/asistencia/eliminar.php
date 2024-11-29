<?php
if (!isset($_POST["id_asistencia"])) {
    exit();
}

$id_asistencia = $_POST["id_asistencia"];
include_once "conexion.php";

$sentencia = $base_de_datos->prepare("DELETE FROM asistencia WHERE id_asistencia = ?;");
$resultado = $sentencia->execute([$id_asistencia]);

if ($resultado) {
    echo '
    <script>
    alert("El usuario ha sido eliminado correctamente.");
    window.location.href = "asistencia.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("El usuario NO ha sido eliminado.");
    window.location.href = "asistencia.php";
    </script>
    ';
}
?>
