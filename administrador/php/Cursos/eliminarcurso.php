<?php
if(!isset($_POST["id_cursos"])) exit();
$id_cursos = $_POST["id_cursos"];
include_once "conexion.php";
try{
$sentencia = $base_de_datos->prepare("DELETE FROM cursos WHERE id_cursos = ?;");
$resultado = $sentencia->execute([$id_cursos]);

if ($resultado ) {
    echo '<script>
        alert("eliminado correctamente.");
        window.location.href = "curso.php";
    </script>';
} else {
    echo '<script>
        alert("NO pudo ser eliminado.");
        window.location.href = "curso.php";
    </script>';
}
}
catch (PDOException $e) {
    error_log("Error de actualización: " . $e->getMessage());
}

?>