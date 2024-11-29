<?php
include "consultarLogro.php";
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
    <title>Página Principal</title>
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
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">EDUFAST</div>
            <div class="list-group list-group-flush my-3">
                <a href="../admin/crear/publicaciones_crear.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Publicaciones</a>
                <a href="../php/registro/funciones/registro.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Registro</a>
                <a href="../php/jornadas/vistas/jornadas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Jornadas</a>
                <a href="../php/grados/vistas/grados.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Grados</a>
                <a href="../php/cursos/curso.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Cursos</a>
                <a href="../php/asistencia/asistencia.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Asistencias</a>
                <a href="../php/materiaphp/materia.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Materias</a>
                <a href="../php/logrophp/logros.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Logros</a>
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
                    <main class="main-container">
                        <section class="container">
                            <h1 class="title text-center mb-5">LOGROS</h1>
                            <section class="row">
                                <?php foreach ($logros as $logro): ?>
                                    <section class="col-lg-4 col-md-8 col-sm-8 col-12 mb-4">
                                        <section class="card">
                                            <section class="card-body">
                                                <div class="card-color">
                                                    <p class="card-text text-left"><?php echo htmlspecialchars($logro->id_logro); ?> <h5 class="text-center"><?php echo htmlspecialchars($logro->nombre_logro); ?></h5></p>
                                                    <p class="card-text text-left"><?php echo htmlspecialchars($logro->materia); ?></p>
                                                    <p class="card-text text-left"><?php echo htmlspecialchars($logro->descripcion_logro); ?></p>

                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-outline-dark boton-carrito" data-bs-toggle="modal" data-bs-target="#eliminarModal<?=$logro->id_logro?>"><i class="fas fa-trash-alt"></i></button>
                                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#actualizar<?=$logro->id_logro?>"><i class="fas fa-edit"></i></button>
                                                    </div>
                                                </div>
                                            </section>
                                        </section>
                                    </section>
                                <?php endforeach; ?>
                            </section>
                            <div class="d-flex justify-content-center mt-5">
                                <a class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#crear">Crear Grado</a>
                            </div>
                        </section>

                        <!--FORMULARIO CREAR-->
                        <div class="modal fade" id="crear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tituloformulario" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="tituloformulario"><b>Crear Logro</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="registrarLogro.php">
                                            <div class="mb-3">
                                                <label for="codLogro" class="form-label">Código Logro</label>
                                                <input placeholder="Escribe el código del logro" name="id_logro" type="number" class="form-control" id="codLogro">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nameLogro" class="form-label">Nombre del Logro</label>
                                                <input placeholder="Escribe el título del logro" name="nombre_logro" type="text" class="form-control" id="nameLogro">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripLogro" class="form-label">Descripción del Logro</label>
                                                <textarea placeholder="Escribe la descripción del logro" name="descrip_logro" class="form-control" id="descriplogro" rows="3"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_materia">Actividad</label>
                                                <select class="form-control" name="id_materia" id="id_materia" required>
                                                    <option selected disabled>Seleccionar Materia</option>
                                                    <?php foreach ($materias as $materia): ?>
                                                        <option value="<?= $materia['id_materia'] ?>"><?= $materia['materia'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btnmodal">Crear</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--FORMULARIO ACTUALIZAR-->
                        <?php foreach ($logros as $logro): ?>
                            <div class="modal fade" id="actualizar<?=$logro->id_logro?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizar<?=$logro->id_logro?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="actualizar<?=$logro->id_logro?>"><b>Actualizar Logro</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="actualizar.php">
                                                <div class="mb-3">
                                                    <label for="codLogro" class="form-label">Código Logro</label>
                                                    <input placeholder="Escribe el código del logro" name="id_logro" value="<?php echo htmlspecialchars($logro->id_logro); ?>" type="number" class="form-control" id="codLogro" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nameLogro" class="form-label">Nombre del Logro</label>
                                                    <input placeholder="Escribe el título del logro" name="nombre_logro" value="<?php echo htmlspecialchars($logro->nombre_logro); ?>" type="text" class="form-control" id="nameLogro">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descripLogro" class="form-label">Descripción del Logro</label>
                                                    <textarea placeholder="Escribe la descripción del logro" name="descrip_logro" class="form-control" id="descriplogro" rows="3"><?php echo htmlspecialchars($logro->descripcion_logro); ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="id_materia">Materia</label>
                                                    <select class="form-control" name="id_materia" id="id_materia" required>
                                                        <option selected disabled>Seleccionar Materia</option>
                                                        <?php foreach ($materias as $materia): ?>
                                                            <option value="<?= $materia['id_materia'] ?>" <?= $logro->id_materia == $materia['id_materia'] ? 'selected' : '' ?>><?= $materia['materia'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary btnmodal">Actualizar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--FORMULARIO ELIMINAR-->
                            <div class="modal fade" id="eliminarModal<?=$logro->id_logro?>" tabindex="-1" aria-labelledby="eliminarModal<?=$logro->id_logro?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModal<?=$logro->id_logro?>">Eliminar Logro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar el logro <strong><?php echo htmlspecialchars($logro->nombre_logro); ?></strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <form method="post" action="eliminarLogro.php">
                                                <input type="hidden" name="id_logro" value="<?php echo htmlspecialchars($logro->id_logro); ?>">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
    <footer class="footer-bottom bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">©2024 codeOpacity. Designed by <span>EDUFAST</span></p>
        <div class="socials d-flex justify-content-center mt-2">
            <a href="https://www.facebook.com/cedid.sanpablo.3?locale=es_LA" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/plumapaulista/" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com/Cedidsanpablo" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
            <a href="mailto:cedidsanpablobosa7@educacionbogota.edu.co" class="text-white mx-2"><i class="fab fa-google"></i></a>
        </div>
    </footer>
                                                        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/nav.js"></script>
</body>

</html>
