<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../../../css/publicaciones.css">
    <link rel="stylesheet" href="../../../css/nav.css"/>
  
    <title>Pagina Principal</title>
</head>
<body>
    <div class="d-flex" id="wrapper">

        <div class="listado" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">EDUFAST</div>
            <div class="list-group list-group-flush my-3">

                <a href="../php/publicaciones/funciones/publicaciones_crear.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Publicaciones</a>

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

  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="publicaciones_eliminar.php">Eliminar</a>
  </li>
                             <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               actualizar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="publicaciones_actuali.php">actualizar evento</a></li>
                                <li><a class="dropdown-item" href="publicaciones_actuali2.php">actualizar noticia</a></li>
                            </ul>
                        </li>
                        
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
                    <section class="main-container">
        <div class="form-wrapper">
            <h1 class="text-center mb-5">Subir Evento o Noticia </h1>
            <div class="form-container">
            <form action="crearevento.php" method="post" enctype="multipart/form-data" class="upload-form">
    <div class="image-upload">
        <h2>Subir Evento</h2>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input id="image" class="form-control" type="file" name="imagen" required>
        </div>
        <div class="form-group">
            <label for="event-name">Nombre del Evento:</label>
            <input id="event-name" class="form-control" type="text" name="evento" placeholder="Nombre del evento" required>
        </div>
        <div class="form-group">
            <label for="event-date">Fecha del Evento:</label>
            <input id="event-date" class="form-control" type="date" name="fecha_evento" required>
        </div>
        <div class="form-group">
            <input class="submit-btn btn btn-dark" type="submit" value="Enviar">
        </div>
    </div>
</form>

                <form action="crearnoticia.php" method="post" class="info-form">
                    <div class="info-upload">
                        <h2>Sube Noticia</h2>
                        <div class="form-group">
                            <label for="event-name">Titulo de la noticia:</label>
                            <input id="event-name" class="form-control" type="text" name="titulo" placeholder="Titulo de la noticia">
                        </div>
                        <div class="form-group">
                        <label for="event-name">Noticia:</label>
                        <textarea class="form-control" name="informacion" id="info" cols="40" rows="9" placeholder="Escribe aquí la información"></textarea>
</div>
                        <div class="form-group">
                            <label for="event-name">Echo por:</label>
                            <input id="event-name" class="form-control" type="text" name="escritoPor" placeholder="¿ Quièn lo escribio ?">
                        </div>
                        <div class="form-group">
                            <input class="submit-btn btn btn-dark" type="submit" value="Enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
                    </div>
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
