<?php
if(!isset($_POST["id_materia"])) exit();
$id_materia = $_POST["id_materia"];
include_once "conexion.php";

$sentencia = $base_de_datos->prepare("DELETE FROM materia WHERE id_materia = ?;");
$resultado = $sentencia->execute([$id_materia]);
if ($resultado) {
    echo '<script>
        alert("eliminado correctamente.");
        window.location.href = "Materia.php";
    </script>';
} else {
    echo '<script>
        alert("NO pudo ser eliminado.");
        window.location.href = "Materia.php";
    </script>';
}
