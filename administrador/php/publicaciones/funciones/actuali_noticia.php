<?php
try{
    include_once "../configuracion/conexion.php";

    $id_noticia = $_POST['id_noticia'];
    $titulo = $_POST['titulo'];
    $info = $_POST['info'];

    $sentencia = $base_de_datos->prepare("UPDATE public_noticias SET titulo = ?, info = ? Where id_noticia = ?");
    $resultado = $sentencia->execute([$titulo,$info,$id_noticia]);
    if ($resultado) {
        echo '
        <script>
        alert("Cambios Guardados");
        window.location.href = "../vistas/actualizar_noticia.php";
        </script>
        ';
    }
}
    catch(PDOException $e){
        "<script>
            alert('Error: " . $e->getMessage() . "');
            window.location.href = '../vistas/publicaciones_crear.php';
          </script>";
    }

?>