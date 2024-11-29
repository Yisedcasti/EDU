<?php
if (!isset($_POST["id_actividad"])) {
    exit();
}

$id_actividad = $_POST["id_actividad"];
include_once "conexion.php";

$sentencia = $base_de_datos->prepare("DELETE FROM nota WHERE actividad_id_actividad = ?;");
$resultado = $sentencia->execute([$id_actividad]);

$sentencia = $base_de_datos->prepare("DELETE FROM actividad WHERE id_actividad = ?;");
$resultado = $sentencia->execute([$id_actividad]);

if ($resultado) {
    echo '
    <script>
    alert("El usuario ha sido eliminado correctamente.");
    window.location.href = "actividad.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("El usuario NO ha sido eliminado.");
    window.location.href = "actividad.php";
    </script>
    ';
}
?>
