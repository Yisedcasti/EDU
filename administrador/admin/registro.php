<?php
require('conexion.php');

// Obtener roles desde la base de datos
$roles = $base_de_datos->query("SELECT * FROM rol")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/registro.css">
    <title>Registro</title>
</head>
<body>

    <header class="navbar navbar-expand-lg bg-body-tertiary containernav shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-success d-flex align-items-center gap-2" href="#">
                <img src="../imagenes/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                <span class="text-white">EDUFAST</span>
            </a>

            <!-- Boton Responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto fs-5">
                <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="../index.php">Index</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="inicio2.php">Inicio Sesiòn</a>
  </li>
</ul>
                </div>
            </div>
        </div>
    </header>

    <main class="main-container">
  <div class="wrapper">
    <div class="container main">
        <div class="row">
                    <div class="col-md-12 right">
                    <div class="container2">
        <h1 class="title text-center">Registro</h1>
        <form action="registrarUsuario.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <span class="label">Rol</span>
                <select name="id_rol" id="id_rol"  class="input" required>
                    <option selected disabled></option>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?= $rol['id_rol'] ?>"><?= $rol['rol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="jornada_id_jornada" value="2">
            <div class="form-group">
                <span class="label">Tipo de documento</span>
                <select name="tipo_doc" id="tipo_doc" class="input"  required>
                    <option selected disabled></option>
                    <option value="TI">Tarjeta Identidad</option>
                    <option value="CC">Cédula Ciudadana</option>
                    <option value="CE">Cédula Extranjera</option>
                    <option value="RC">Registro Civil</option>
                </select>
            </div>
            <div class="form-group">
                <span class="label">Nº documento</span>
                <input name="num_doc" id="num_doc" type="number" class="input"  required>
            </div>
            <div class="form-group">
                <span class="label">Nombre completo</span>
                <input name="nombre" id="nombre" type="text"  class="input" required>
            </div>
            <div class="form-group">
                <span class="label">Apellido completo</span>
                <input name="apellido" id="apellido" type="text" class="input"  required>
            </div>
            <div class="form-group">
                <span class="label">Celular</span>
                <input name="celular" id="celular" type="number"  class="input" required>
            </div>
            <div class="form-group">
                <span class="label">Telefono</span>
                <input name="telefono" id="Telefono" type="number"  class="input" required>
            </div>
            <div class="form-group">
                <span class="label">Direccion</span>
                <input name="direccion" id="direccion" type="text"  class="input" required>
            </div>
            <div class="form-group">
                <span class="label">Correo</span>
                <input name="correo" id="correo" type="email" class="input"  required>
            </div>
            <div class="form-group">
                <span class="label">foto_perfil</span>
                <input name="foto_perfil" id="foto_perfil" type="file" class="input"  required>
            </div>
            <div class="form-group">
                <span class="label">Contraseña</span>
                <input name="contraseña" id="contraseña" type="password" class="input"  required>
            </div>
            <div class="button">
                <input type="submit" value="registrar">
            </div>

        </form>
    </div>
                    </div>
        </div>
    </div>
</div>

</main>
</body>
</html>