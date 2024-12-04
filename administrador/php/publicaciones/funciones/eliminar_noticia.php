<?php
if (!isset($_POST["id_noticia"])) {
    exit();
}

$id_noticia = $_POST["id_noticia"];
include_once "../configuracion/conexion.php";
// Eliminar el evento de la base de datos
$sentencia = $base_de_datos->prepare("DELETE FROM public_noticias WHERE id_noticia = ?");
$resultado = $sentencia->execute([$id_noticia]);

if ($resultado) {
    echo '
    <script>
    alert("La noticia ha sido eliminado correctamente.");
    window.location.href = "../vistas/actualizar_noticia.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("El noticia NO ha sido eliminado.");
    window.location.href = "../vistas/actualizar_noticia.php";
    </script>
    ';
}
?>
