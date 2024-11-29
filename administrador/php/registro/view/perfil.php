<?php
include_once "perfilconsulta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/perfil.css">
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
                <a class="nav-link active" href="../funciones/registro.php">Volver</a>
            </div>
        </div>
    </div>
</header>
    <section class="main-container">
        <h1>Datos del Usuario</h1>
        <div class="formulario">
            <div class="foto_perfil">
                <img src="../../../imagenes/5.jpeg" alt="Perfil">
            </div>
            <div class="form-group">
                <label>Rol</label>
                <p><?php echo htmlspecialchars($persona->rol); ?></p>
            </div>
            <div class="form-group">
                <label>Jornada</label>
                <p><?php echo htmlspecialchars($persona->jornada); ?></p>
</div>
<div class="form-group">
                <label>Grado</label>
                <p><?php echo htmlspecialchars($persona->grado ); ?></p>
            </div>
            <div class="form-group">
                <label>curso</label>
                <p><?php echo htmlspecialchars($persona->curso); ?></p>
            </div>
            <div class="form-group">
                <label>Número de documento</label>
                <p><?php echo htmlspecialchars($persona->num_doc); ?></p>
            </div>
            <div class="form-group">
                <label>Tipo de documento</label>
                <p><?php echo htmlspecialchars($persona->tipo_doc); ?></p>
            </div>
            <div class="form-group">
                <label>Nombres</label>
                <p><?php echo htmlspecialchars($persona->nombre); ?></p>
                <label>Apellidos</label>
                <p><?php echo htmlspecialchars($persona->apellido); ?></p>
            </div>
            <div class="form-group">
                <label>Celular</label>
                <p><?php echo htmlspecialchars($persona->celular); ?></p>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <p><?php echo htmlspecialchars($persona->correo); ?></p>
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <p><?php echo htmlspecialchars($persona->usuario); ?></p>
                <label>Contraseña</label>
                <p><?php echo htmlspecialchars($persona->contraseña); ?></p>
            </div>
            <button class="btn"><a href="<?php echo "../funciones/actualizaregistro.php?id=" . $persona->num_doc ?>.">Ir a actualizar</a></button>
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
script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
