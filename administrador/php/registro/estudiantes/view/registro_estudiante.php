<?php
include_once "consultarestudiante.php"; // Incluye el archivo de consulta
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../../../../css/vistasregistros.css"/>
    <title>Pagina Principal</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">EDUFAST</div>
            <div class="list-group list-group-flush my-3">

                <a href="actividad.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Publicaciones</a>

                <a href="../funciones/registro.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Registro</a>

                <a href="curso.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Jornadas</a>

                <a href="grado.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Grados</a>

                <a href="jornada.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Cursos</a>

                <a href="logro.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Asisitencias</a>

                <a href="materia.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Materias</a>

                <a href="nota.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Logros</a>
                <a href="nota.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Actividades</a>
                <a href="nota.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Notas</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Bienvenido</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Maria Camila Torres Jaramillo
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

			<div class="container mt-5">
                <div class="row">
                    <h2 class="text-center">Registros Estudiante</h2>
    <div class="container col-10 justify-content-center">
        <table class="table mt-5">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Jornada</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                    <?php if (!empty($personas)) : ?>
                    <?php foreach ($personas as $persona) : ?>
                        <tr>
                            <td class="text-center"><?php echo htmlspecialchars($persona->rol); ?></td>
                            <td class="text-center"><a class=" text-dark text-decoration-none" href="<?php echo "../../view/perfil.php?id=" . $persona->num_doc ?>"><?php echo htmlspecialchars($persona->nombre); ?></a></td>
                            <td class="text-center"><?php echo htmlspecialchars($persona->apellido); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($persona->jornada); ?></td>
                            <td class="text-center"><a  class=" text-dark text-decoration-none"  type="button" class="underline" data-bs-toggle="modal" data-bs-target="#confirmarModal<?php echo $persona->num_doc ?>" title="En este espacio podras asignarle al estudiante un cruso y un grado">Asignar</a></td>
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
    <div class="d-grid gap-2 col-4 ">
        <button type="button" class="btn btn-dark text-light">
              <a class="text-light text-decoration-none" href="../funciones/registroeliminarestudiante.php">Eliminar registro</a>
        </button>
    </div>
                    </div>

    <?php foreach($personas as $persona): ?>
    <div class="modal fade" id="confirmarModal<?php echo $persona->num_doc ?>" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel<?php echo $persona->num_doc ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarModalLabel<?php echo $persona->num_doc ?>">Asignar curso y grado al alumno <b><?php echo htmlspecialchars($persona->nombre); ?></b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../funciones/asignar.php">
                        <input type="hidden" name="num_doc" value="<?php echo $persona->num_doc ?>">
                        <label for="id_grado" class="form-label">Grado</label>
                        <select class="form-control" name="id_grado" id="id_grado" required>
                            <option selected disabled>--Seleccionar grado--</option>
                            <?php foreach ($grados as $grado): ?>
                                <option value="<?= $grado['id_grado'] ?>"><?= $grado['grado'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="id_curso" class="form-label">Curso</label>
                        <select class="form-control" name="id_curso" id="id_curso" required>
                            <option selected disabled>--Seleccionar curso--</option>
                            <?php foreach ($cursos as $curso): ?>
                                <option value="<?= $curso['id_curso'] ?>"><?= $curso['curso'] ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Asignar</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

                </div>
            </div>

            </div>
        </div>
    </div>
<footer class="footer-bottom bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">©2024 codeOpacity. Designed by <span>EDUFAST</span></p>
        <div class="socials d-flex justify-content-center mt-2">
            <a href="https://www.facebook.com/cedid.sanpablo.3?locale=es_LA" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/plumapaulista/" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com/Cedidsanpablo" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
            <a href="mailto:cedidsanpablobosa7@educacionbogota.edu.co" class="text-white mx-2"><i class="fab fa-google"></i></a>
        </div>
    </footer>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>