<?php

include('../configuracion/conexion.php');

$num_doc = $_POST['num_doc'];
$id_grado = $_POST['id_grado'];
$id_curso = $_POST['id_curso'];

$consultar = $base_de_datos->prepare("SELECT r.id_rol, r.id_jornada FROM registro AS r WHERE num_doc = ?");
$consultar->execute([$num_doc]);
$resultado = $consultar->fetch(PDO::FETCH_ASSOC);

if (!$resultado) {
    exit("No se encontró información para este número de documento.");
}

$id_rol = $resultado['id_rol'];
$id_jornada = $resultado['id_jornada'];

$consultaGrado = $base_de_datos->prepare("SELECT g.jornada_id_jornada FROM grado AS g WHERE id_grado = ?");
$consultaGrado->execute([$id_grado]);
$resultadoGrado = $consultaGrado->fetch(PDO::FETCH_ASSOC);

if (!$resultadoGrado) {
    exit("No se encontró información para este grado."); 
}

$jornada_id_jornada = $resultadoGrado['jornada_id_jornada'];

$consultaCurso = $base_de_datos->prepare("SELECT c.grado_id_grado, c.grado_jornada_id_jornada FROM curso AS c WHERE id_curso = ?");
$consultaCurso->execute([$id_curso]); 
$resultadoCurso = $consultaCurso->fetch(PDO::FETCH_ASSOC);

if (!$resultadoCurso) {
    exit("No se encontró información para este curso.");
}

$grado_id_grado = $resultadoCurso['grado_id_grado'];
$grado_jornada_id_jornada = $resultadoCurso['grado_jornada_id_jornada'];

try {
    $sentencia = $base_de_datos->prepare("INSERT INTO asignacion(registro_num_doc, registro_rol_id_rol, registo_jornada_id_jornada, grado_id_grado, grado_jornada_id_jornada, curso_id_curso, curso_grado_id_grado, curso_grado_jornada_id_jornada) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
    
    $resultado = $sentencia->execute([$num_doc, $id_rol, $id_jornada, $id_grado, $jornada_id_jornada, $id_curso, $grado_id_grado, $grado_jornada_id_jornada]);

    if ($resultado === TRUE) {
        echo "INSERTADO CORRECTAMENTE";
    } else {
        echo "Algo salió mal. Por favor verifique que la tabla exista y que los campos sean correctos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
