<?php
include "consulta.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../../css/nav.css" />
    <title>Pagina Principal</title>
</head>

<body>
    <style>
        .container {
            font-family: serif;
            font-size: 17px;
        }

        .card {
            background: linear-gradient(to bottom right, #8FB8DE, #A4C3B2);
        }
    </style>

    <div class="d-flex" id="wrapper">

        <div class="listado" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">EDUFAST
            </div>
            <div class="list-group list-group-flush my-3">

                <a href="../admin/crear/publicaciones_crear.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Publicaciones</a>

                <a href="../php/registro/funciones/registro.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Registro</a>

                <a href="../php/jornadas/vistas/jornadas.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Jornadas</a>

                <a href="../php/grados/vistas/grados.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Grados</a>

                <a href="../php/cursos/curso.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Cursos</a>

                <a href="../php/asistencia/asistencia.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Asistencias</a>

                <a href="../php/materiaphp/materia.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Materias</a>

                <a href="nota.html"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Logros</a>
                <a href="../php/actividad/actividad.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Actividades</a>
                <a href="../php/notas/notas.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Notas</a>
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

            <main class="main-container">
                <section class="container ms-4">
                    <h1 class="title text-center mb-5">Materias</h1>

                    <?php
                    $areaActual = null;
                    foreach ($materias as $materia):
                        if ($areaActual !== $materia->nombre_area) {
                            if ($areaActual !== null) {
                                echo '</section>';
                            }
                            $areaActual = $materia->nombre_area;
                            echo '<section class="row mb-3">';
                            echo '<h3 class="col-12 text-center mb-3">' . htmlspecialchars($materia->nombre_area) . '</h3>';
                        }
                        ?>

                        <section class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <h4 class="card-header text-center"><?php echo htmlspecialchars($materia->nombre_area); ?>
                                </h4>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($materia->materia); ?></h5>
                                    <p class="card-text">Grado: <?php echo htmlspecialchars($materia->grado); ?></p>
                                    <p class="card-text">Maestro: <?php echo htmlspecialchars($materia->nombres); ?>
                                        <?php echo htmlspecialchars($materia->profesion); ?></p>
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#actualizar<?= $materia->id_materia ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#eliminarModal<?= $materia->id_materia ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </section>

                    <?php endforeach; ?>

                </section> <!-- Cerrar la última fila -->

                <div class="d-flex justify-content-center mt-5 ">
                    <a class="btn btn-dark mb-5" type="button" data-bs-toggle="modal" data-bs-target="#crear">Crear
                        Grado</a>
                </div>
                </section>



                <div class="modal fade" id="crear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="tituloformulario" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="tituloformulario"><b>Crear Logro</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="registrarmateria.php">
                                    <div class="mb-3">
                                        <label for="id_curso">Grado</label>
                                        <select class="form-control" name="grado_id_grado" id="grado_id_grado" required>
                                            <option selected disabled>Seleccionar grado</option>
                                            <?php foreach ($grados as $grado): ?>
                                                <option value="<?= $grado['id_grado'] ?>"><?= $grado['grado'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_curso">area</label>
                                        <select class="form-control" name="area_id_area" id="area_id_area" required>
                                            <option selected disabled>Seleccionar Area</option>
                                            <?php foreach ($areas as $area): ?>
                                                <option value="<?= $area['id_area'] ?>"><?= $area['nombre_area'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="materia" class="form-label">Materia</label>
                                        <input placeholder="escriba nombre de la materia" name="materia" type="text"
                                            class="form-control" id="materia">
                                    </div>
                                    <div class="mb-3">
                                        <label for="docente_registro_num_doc">Profesor y Especialidad</label>
                                        <select class="form-control" name="docente_info" id="docente_info" required>
                                            <option selected disabled>Seleccionar profesor y especialidad</option>
                                            <?php foreach ($registros as $registro): ?>
                                                <?php foreach ($docentes as $docente): ?>
                                                    <option value="<?= $registro['num_doc'] ?>"
                                                        data-especialidad="<?= $docente['id_docente'] ?>">
                                                        <?= $registro['nombres'] . " - " . $docente['profesion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Campos ocultos para enviar los datos -->
                                    <input type="hidden" name="docente_registro_num_doc" id="docente_registro_num_doc">
                                    <input type="hidden" name="docente_id_docente" id="docente_id_docente">

                                    <button type="submit" class="btn btn-primary btnmodal">Crear</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($materias as $materia): ?>
                    <!--FORMULARIO aCTUALIZAR-->
                    <div class="modal fade" style="font-family: Arial, Helvetica, sans-serif;"
                        id="actualizar<?= $materia->id_materia ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="actualizar<?= $materia->id_materia ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="tituloformulario"><b>Actualizar materia
                                            <?= $materia->id_materia ?></b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="actualizar.php">
                                        <input type="hidden" name="id_materia" value="<?= $materia->id_materia ?>">
                                        <div class="mb-3">
                                            <label for="grado_id_grado">grado</label>
                                            <select class="form-control" name="grado_id_grado" id="grado_id_grado" required>
                                                <option selected disabled>Seleccionar grado</option>
                                                <?php foreach ($grados as $grado): ?>
                                                    <option value="<?= $grado['id_grado'] ?>"
                                                        <?= $materia->id_grado == $grado['id_grado'] ? 'selected' : '' ?>>                                                        <?= $grado['grado'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="area_id_area">area</label>
                                            <select class="form-control" name="area_id_area" id="area_id_area" required>
                                                <option selected disabled>Seleccionar area</option>
                                                <?php foreach ($areas as $area): ?>
                                                    <option value="<?= $area['id_area'] ?>"
                                                        <?= $materia->id_area == $area['id_area'] ? 'selected' : '' ?>>
                                                        <?= $area['nombre_area'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="materia" class="form-label">Materia</label>
                                            <input name="materia" value="<?php echo htmlspecialchars($materia->materia); ?>"
                                                class="form-control" id="materia">
                                        </div>
                                        <div class="mb-3">
    <label for="docente_info">Profesor y Especialidad</label>
    <select class="form-control" name="docente_info" id="docente_info" required>
        <option selected disabled>Seleccionar profesor y especialidad</option>
        <?php foreach ($registros as $registro): ?>
            <?php foreach ($docentes as $docente): ?>
                <option value="<?= $registro['num_doc'] ?>"
                    <?= $materia->docente_registro_num_doc == $registro['num_doc'] && $materia->docente_id_docente == $docente['id_docente'] ? 'selected' : '' ?>
                    data-especialidad="<?= $docente['id_docente'] ?>">
                    <?= $registro['nombres'] . " - " . $docente['profesion'] ?>
                </option>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </select>
</div>
<!-- Campos ocultos para enviar los datos -->
<input type="hidden" name="docente_registro_num_doc" id="docente_registro_num_doc" value="<?= $materia->docente_registro_num_doc ?>">
<input type="hidden" name="docente_id_docente" id="docente_id_docente" value="<?= $materia->docente_id_docente ?>">
                                      
                                        <button type="submit" class="btn btn-primary btnmodal">Actualizar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Modal eliminar--->
                <div class="modal fade" style="font-family: Arial, Helvetica, sans-serif;"
                    id="eliminarModal<?= $materia->id_materia ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="eliminarModalLabel <?= $materia->id_materia ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center"><b>Eliminar Materia</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Está seguro que desea eliminar la Materia <b>
                                        <?= $materia->materia ?>
                                    </b>? Esta acción no se puede deshacer.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <form method="POST" action="eliminarmateria.php">
                                    <input type="hidden" name="id_materia" value="<?= $materia->id_materia ?>">
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
            <a href="https://www.facebook.com/cedid.sanpablo.3?locale=es_LA" class="text-white mx-2"><i
                    class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/plumapaulista/" class="text-white mx-2"><i
                    class="fab fa-instagram"></i></a>
            <a href="https://x.com/Cedidsanpablo" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
            <a href="mailto:cedidsanpablobosa7@educacionbogota.edu.co" class="text-white mx-2"><i
                    class="fab fa-google"></i></a>
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
        document.getElementById("docente_info").addEventListener("change", function () {
            var selectedOption = this.options[this.selectedIndex];
            var numDoc = selectedOption.value;
            var idDocente = selectedOption.getAttribute("data-especialidad");

            document.getElementById("docente_registro_num_doc").value = numDoc;
            document.getElementById("docente_id_docente").value = idDocente;
        });
    </script>
</body>

</html>