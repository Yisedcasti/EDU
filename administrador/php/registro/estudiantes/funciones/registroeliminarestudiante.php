<?php
include_once "../view/consultarestudiante.php"; // Incluye el archivo de consulta
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de los usuarios existentes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/vistasregistros.css">
</head>
<body>
<header class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container d-flex justify-content-between align-items-left">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-success d-flex align-items-center gap-2" href="#">
            <img src="../../../imagenes/logo.png" alt="Logo" width="68" height="68" class="d-inline-block align-text-top">
            <span class="text-dark">EDUFAST</span>
        </a>
        <!-- Botón Responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto fs-5">
                <a class="nav-link active" href="../view/registro_coordinador.php">Volver</a>
            </div>
        </div>
    </div>
</header>
<section class="main-container">
    <h2 class="text-center">Registros Coordinador</h2>
    <div class="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Jornada</th>
                    <th class="text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($personas)) : ?>
                    <?php foreach ($personas as $persona) : ?>
                        <tr>

                            <td class="text-center"><?php echo htmlspecialchars($persona->rol); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($persona->nombre); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($persona->apellido); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($persona->jornada); ?></td>
                            <td class="text-center"><a  class=" text-dark text-decoration-none"  type="button" class="underline" data-bs-toggle="modal" data-bs-target="#confirmarModal<?php echo $persona->num_doc ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron registros.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php foreach($personas as $persona): ?>
    <div class="modal fade" id="confirmarModal<?php echo $persona->num_doc ?>" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel<?php echo $persona->num_doc ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarModalLabel<?php echo $persona->num_doc ?>">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" action="deleteRegistro.php">
                        <input type="hidden" name="num_doc" value="<?php echo $persona->num_doc ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</section>
<footer class="footer-bottom">
    <p>copyright &copy;2024 codeOpacity. designed by <span>EDUFAST</span></p>
    <footer class="socials">
        <a href="https://www.facebook.com/cedid.sanpablo.3?locale=es_LA" class="icon"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/plumapaulista/" class="icon"><i class="fab fa-instagram"></i></a>
        <a href="https://x.com/Cedidsanpablo" class="icon"><i class="fab fa-twitter"></i></a>
        <a href="mailto:cedidsanpablobosa7@educacionbogota.edu.co" class="icon"><i class="fab fa-google"></i></a>
    </footer>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
