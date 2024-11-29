<?php
if (!isset($_POST["id_jornada"])) {
    exit();
}

$id_jornada = $_POST["id_jornada"];
include_once "../configuracion/conexion.php";

// Eliminar registro en la tabla 'jornada'
$eliminarJornada = $base_de_datos->prepare("DELETE FROM jornada WHERE id_jornada = ?;");
$resultado = $eliminarJornada->execute([$id_jornada]);

if ($resultado) {
    echo '
    <script>
    alert("El usuario ha sido eliminado correctamente.");
    window.location.href = "../vistas/jornadas.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("El usuario NO ha sido eliminado.");
    window.location.href ="../vistas/jornadas.php";
    </script>
    ';
}
?>
