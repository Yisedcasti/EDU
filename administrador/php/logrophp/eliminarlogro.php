<?php
if(!isset($_POST["id_logro"])) exit();
$id_logro= $_POST["id_logro"];


include_once "conexion.php";

$sentencia = $base_de_datos->prepare("DELETE FROM logro WHERE id_logro = ?;");
$resultado = $sentencia->execute([$id_logro]);

if ($resultado) {
    echo '<script>
        alert("El logro ha sido eliminado correctamente.");
        window.location.href = "logros.php";
    </script>';
} else {
    echo '<script>
        alert("El logro NO pudo ser eliminado.");
        window.location.href = "logros.php";
    </script>';
}
