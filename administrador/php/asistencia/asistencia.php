<?php
include_once "consultar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../../css/nav.css"/>
    <title>Pagina Principal</title>
</head>
<body>
    <div class="d-flex" id="wrapper">

        <div class="listado" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">EDUFAST</div>
            <div class="list-group list-group-flush my-3">

                <a href="../admin/crear/publicaciones_crear.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Publicaciones</a>

                <a href="../php/registro/funciones/registro.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Registro</a>

                <a href="../php/jornadas/vistas/jornadas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Jornadas</a>

                <a href="../php/grados/vistas/grados.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Grados</a>

                <a href="../php/cursos/curso.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Cursos</a>

                <a href="../php/materiaphp/materia.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Materias</a>

                <a href="nota.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Logros</a>
                <a href="../php/actividad/actividad.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Actividades</a>
                <a href="../php/notas/notas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Notas</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
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
                    <div class="col-md-12 text-center">
                    <main class="main-container ">
                    <h1 class="text-dark m-4">Asistencias</h1>
        <section class="container">
        <?php foreach ($asistencias as $asistencia) : ?>
            <table class="table mb-5">
                <tr>
                    <th  class="text-center">Asistencia</th>
                    <th  class="text-center">Fecha_asistencia</th>
                    <th  class="text-center">Alumno</th>
                    <th  class="text-center">Acciones</th>
                </tr>
                <tr>
                    <td class="cursos text-center mt-3"><?php echo htmlspecialchars($asistencia->asistencia); ?></td>
                    <td class="cursos text-center mt-3"><?php echo htmlspecialchars($asistencia->fecha_asistencia); ?></td>
                    <td class="cursos text-center mt-3"><?php echo htmlspecialchars($asistencia->nombre); ?> <?php echo htmlspecialchars($asistencia->apellido); ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#actualizarModal<?php echo $asistencia->id_asistencia ?>"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#confirmarModal<?php echo $asistencia->id_asistencia ?>"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>
            <div class="d-flex justify-content-center mb-4">
            <a class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#crear">Crear Curso</a>
        </div>
        </section>
        

<!-- actualizar -->
<?php foreach($asistencias as $asistencia): ?>
<div class="modal fade" id="actualizarModal<?php echo $asistencia->id_asistencia ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Asistencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formActualizar" method="POST" action="Actualizar.php">
                    <input type="hidden" name="id_asistencia" id="id_asistencia" value="<?php echo $asistencia->id_asistencia ?>">
                    <div class="form-group">
    <label for="registro_num_doc">Estudiante</label>
    <select class="form-control" name="registro_num_doc" id="registro_num_doc" required>
                                    <?php foreach ($registros as $registro): ?>
                                        <option value="<?= $registro['num_doc'] ?>" <?= $asistencia->registro_num_doc == $registro['num_doc'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($registro['nombre']) ?> <?= htmlspecialchars($registro['apellido']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
</div>
                    <div class="mb-3">
                        <label for="fecha_asistencia" class="form-label">Fecha Asistencia</label>
                        <input type="date" class="form-control" id="fecha_asistencia" name="fecha_asistencia" value="<?php echo $asistencia->fecha_asistencia ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="asistencia" class="form-label">Asistencia</label>
                        <input type="text" class="form-control" id="asistencia" name="asistencia" value="<?php echo $asistencia->asistencia ?>" required>
</div>              
                    <div class="modal-footer mt-3 justify-content-center">
                    <button type="submit" class="btn btn-dark r">Actualizar</button>
        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

          <!-- FORMULARIO CREAR -->

<div class="modal fade" id="crear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tituloformulario" aria-hidden="true">
<?php if (!empty($mensaje)): ?>
        <div class="alert <?= $claseAlerta; ?> alert-dismissible fade show" role="alert">
            <?= $mensaje; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloformulario">Crear Logro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="mt-5">Crear Actividad</h2>
                <form action="guardar.php" method="POST">
                <div class="form-group">
                        <label for="registro_num_doc">Alumno</label>
                        <select class="form-control" name="registro_num_doc" id="registro_num_doc" required>
                            <?php foreach ($registros as $registro): ?>
                                <option value="<?= $registro['num_doc'] ?>"><?= $registro['nombre'] ?> <?= $registro['apellido'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="asistencia">Asistencia</label>
                        <input type="text" class="form-control" id="asistencia" name="asistencia" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_asistencia">fecha_asistencia</label>
                          <input type="date" class="form-control" id="asistencia" name="fecha_asistencia" required>
                    </div>
                    
                    <div class="modal-footer m-3 justify-content-cente">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                            <!--Eliminar-->
<?php foreach($asistencias as $asistencia): ?>
    <div class="modal fade" id="confirmarModal<?php echo $asistencia->id_asistencia ?>" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel<?php echo $asistencia->id_asistencia ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarModalLabel<?php echo $asistencia->id_asistencia?>">Confirmar Eliminación <?php echo $asistencia->asistencia ?> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" action="eliminar.php">
                        <input type="hidden" name="id_asistencia" value="<?php echo $asistencia->id_asistencia ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</main>
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
