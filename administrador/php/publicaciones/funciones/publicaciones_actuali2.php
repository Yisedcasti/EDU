<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Información</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/publicaciones_actuali2.css">
</head>
<body>
    <header class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container d-flex justify-content-between align-items-left">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-success d-flex align-items-center gap-2" href="#">
                <img src="../../imagenes/logo.png" alt="Logo" width="68" height="68" class="d-inline-block align-text-top">
                <span class="text-dark">EDUFAST</span>
            </a>
            <!-- Boton Responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto fs-5">
            <a href="../crear/publicaciones_crear.php" class="nav-link active" title="Volver a crear">Volver</a>
            <a href="../actualizar/publicaciones_actuali.php" class="nav-link active" title="Ir a imágenes">Imágenes</a>
            <a href="../eliminar/publicaciones_eliminar.php" class="nav-link active" title="Ir a eliminar">Eliminar</a>
                </div>
            </div>
        </div>
    </header>
    <section class="main-container">
        <h1>Actualizar Información</h1>
        <table>
            <tr>
                <th colspan="2">Información</th>
            </tr>
            <tr>
                <td class="infoEstilo">
                    <p>Coordial saludo<br>Les informamos que la tercera asamblea de padres de familia se realizará el próximo <b>viernes 17 de julio en el horario de 7:00 a 8:20 am;</b> agradezco su puntualidad porque los docentes tienen clase a las 8:30 am.<br>Atentamente, María Adela Quintero<br><br></p>
                </td>
                <td><a href="#" title="Actualizar información" class="actualizar">Actualizar</a></td>
            </tr>
            <tr>
                <td class="infoEstilo">
                    <p>Estimados padres de familia y acudientes:<br>
                        Reciban un cordial saludo.<br>
                        Nos permitimos informarles que la entrega de boletines académicos del segundo trimestre se realizará el próximo <b>viernes 12 de julio de 2024 de 8:00 am a 12:00 pm</b>. El lugar de la reunión será en los salones donde los estudiantes toman clases.<br>
                        Es fundamental que asistan para conocer el rendimiento académico de sus hijos y discutir cualquier inquietud con los profesores. En caso de no poder asistir, favor comunicarse con la coordinación académica para programar una cita alternativa.<br>
                        Atentamente, María Adela Quintero<br><br>
                    </p>
                </td>
                <td><a href="#" title="Actualizar información" class="actualizar" >Actualizar</a></td>
            </tr>
            
        </table>
        <div class="info">
            <h2>Actualizar Información</h2>
            <textarea name="informacion" id="" cols="40" rows="9"></textarea>
            <div class="btn2"><input type="button" value="Actualizar"></div>
        </div>
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
</body>
</html>
