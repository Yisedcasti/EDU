<?php
include_once "../configuracion/conexion.php";

// Realiza la consulta a la base de datos
try {
    $sentencia = $base_de_datos->prepare("SELECT * FROM publicacion");
    $sentencia->execute();
    $publicaciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar imágenes y información</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/publicaciones_actuali.css">
</head>
<body>

<header class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container d-flex justify-content-between align-items-left">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-success d-flex align-items-center gap-2" href="#">
            <img src="../../imagenes/logo.png" alt="Logo" width="68" height="68" class="d-inline-block align-text-top">
            <span class="text-dark">EDUFAST</span>
        </a>
        <!-- Botón Responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto fs-5">
                <a href="../crear/publicaciones_crear.php" class="nav-link" title="Volver a crear">Volver</a>
                <a href="../actualizar/publicaciones_actuali2.php" class="nav-link" title="Volver a actualizar info">Información</a>
                <a href="../eliminar/publicaciones_eliminar.php" class="nav-link" title="Ir a eliminar">Eliminar</a> 
            </div>
        </div>
    </div>
</header>

<section class="main-container">
    <h1 class="titulo">Actualizar Imágenes</h1>

    <!-- Tabla de publicaciones -->
   <!-- Tabla de publicaciones -->
<table class="table">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Evento</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($publicaciones as $publicacion): ?>
        <tr>
            <td class="imagen">
                <img src="<?php echo "../../../imagenes/" . htmlspecialchars($publicacion->imagen); ?>" alt="Imagen del evento" style="width: 100px; height: auto;">
            </td>

            <td class="evento">
                <p><?php echo htmlspecialchars($publicacion->evento); ?></p>
            </td>
            <td class="fecha">
                <p><?php echo htmlspecialchars($publicacion->fecha_evento); ?></p>
            </td>
            <td class="actualizar">
                <!-- Botón para abrir el modal -->
                <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#actualizarModal<?php echo $publicacion->id_publicacion ?>">Actualizar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modales de actualización -->
<?php foreach ($publicaciones as $publicacion): ?>
<div class="modal fade" id="actualizarModal<?php echo $publicacion->id_publicacion ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Publicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="actualizarForm<?php echo $publicacion->id_publicacion; ?>" action="crearevento.php" method="post" enctype="multipart/form-data" class="upload-form mb-4">
                    <div class="form-group">
                        <label for="">Imagen:</label>
                        <input class="form-control" type="file" name="imagen" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nombre del Evento:</label>
                        <input class="form-control" type="text" name="evento" value="<?php echo htmlspecialchars($publicacion->evento); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha del Evento:</label>
                        <input class="form-control" type="date" name="fecha_evento" value="<?php echo htmlspecialchars($publicacion->fecha_evento); ?>" required>
                    </div>
                    <input type="hidden" name="id_publicacion" value="<?php echo htmlspecialchars($publicacion->id_publicacion); ?>">
                    <div class="form-group">
                        <input class="submit-btn btn btn-dark" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</section>

<footer class="footer-bottom">
    <p>Copyright &copy;2024 codeOpacity. Designed by <span>EDUFAST</span></p>
    <div class="socials">
        <a href="https://www.facebook.com/cedid.sanpablo.3?locale=es_LA" class="icon"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/plumapaulista/" class="icon"><i class="fab fa-instagram"></i></a>
        <a href="https://x.com/Cedidsanpablo" class="icon"><i class="fab fa-twitter"></i></a>
        <a href="mailto:cedidsanpablobosa7@educacionbogota.edu.co" class="icon"><i class="fab fa-google"></i></a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>
