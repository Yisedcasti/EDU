<?php

include_once "conexion.php";

$materia = $_POST["materia"];
$grado_id_grado = $_POST["grado_id_grado"];
$area_id_area = $_POST["area_id_area"];
$docente_registro_num_doc = $_POST["docente_registro_num_doc"];
$docente_id_docente = $_POST["docente_id_docente"];

$consultar = $base_de_datos->prepare("SELECT cursos_id_cursos,
cursos_grado_id_grado,
registro_rol_id_rol,
registro_jornada_id_jornada   
FROM docente  WHERE id_docente = ?");

$consultar->execute([$docente_id_docente]);
$resultado = $consultar->fetch(PDO::FETCH_ASSOC);

if (!$resultado) {
    exit("No se encontró información para este docente.");
}

$docente_cursos_id_cursos = $resultado['cursos_id_cursos'];
$docente_cursos_grado_id_grado = $resultado['cursos_grado_id_grado'];
$docente_registro_rol_id_rol = $resultado['registro_rol_id_rol'];
$docente_registro_jornada_id_jornada = $resultado['registro_jornada_id_jornada'];

$sentencia = $base_de_datos->prepare("INSERT INTO materia (
    materia,
    grado_id_grado,
    area_id_area,
    docente_id_docente,
    docente_cursos_id_cursos,
    docente_cursos_grado_id_grado,
    docente_registro_num_doc,
    docente_registro_rol_id_rol,
    docente_registro_jornada_id_jornada
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");

$resultado = $sentencia->execute([$materia, $grado_id_grado, $area_id_area,$docente_id_docente,$docente_cursos_id_cursos,$docente_cursos_grado_id_grado,$docente_registro_num_doc,$docente_registro_rol_id_rol,$docente_registro_jornada_id_jornada]);

if ($resultado) {
    echo '<script>
            alert("Insertado correctamente");
            window.location.href = "materia.php";
          </script>';
} else {
    echo "Algo salió mal. Por favor verifica que las tablas existan o que los datos sean válidos.";
}
?>