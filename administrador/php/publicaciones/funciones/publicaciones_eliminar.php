<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/publicaciones_eliminar.css">
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
                <a href="../crear/publicaciones_crear.php" title="Volver a crear" class="nav-link active">Volver</a>
                <a href="../actualizar/publicaciones_actuali.php" title="Volver a actualizar" class="nav-link active">Actualizar</a>
                </div>
            </div>
        </div>
    </header>
    <section class="main-container ">
    <h1>Eliminar imagenes e información</h1>
   <div class="TablasInfo">
    <div class="eliminarImagenes">
        <table>
            <tr>
                <th>Imagen</th>
                <th>Evento</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td class="imagen">
                    <img src="../../imagenes/5.jpeg" alt="">
                </td>
                <td class="evento">
                    <p>Lorem ipsum dolor, sit amet consectetur...</p>
                </td>
                <td class="fecha">
                    <p>29/05/24</p>
                </td>
                <td >
                    <a href="#" title="eliminar imagen" class="Eliminar">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td class="imagen">
                    <img src="../../imagenes/5.jpeg" alt="">
                </td>
                <td class="evento">
                    <p>Lorem ipsum dolor, sit amet consectetur...</p>
                </td>
                <td class="fecha">
                    <p>29/05/24</p>
                </td>
                <td>
                    <a href="#" title="Eliminar imagen" class="Eliminar">Eliminar</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="EliminarInfo">
        <table>
            <tr>
                <th colspan="2">Información</th>
            </tr>
            <tr>
                <td class="infoEstilo">
                    <p>Coordial saludo<br>Les informamos que la tercera asamblea de padres de familia se realizará el próximo <b>viernes 17 de julio en el horario de 7:00 a 8:20 am;</b> agradezco su puntualidad porque los docentes tienen clase a las 8:30 am.<br>Atentamente, María Adela Quintero<br><br></p>
                </td>
                <td><a href="#" title="Eliminar información" class="Eliminar">Eliminar</a></td>
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
                <td><a href="#" title="Elminar información" class="Eliminar" >Eliminar</a></td>
            </tr>
        </table>
    </div>
   </div>
    </section>
   
</body>
</html>