<?php
include_once "consultar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/listados.css">
</head>
<body>
    <header class="containernav">
        <figure class="logo">
            <img src="../imagenes/logo.png" alt="logo">
            <h2>EDUFAST</h2>
        </figure>
            <nav>
                <a href="pag_principal.html" class="item-options">volver</a>

            </nav>
    </header>
    <main class="main-container">
        <h1>Listados por curso</h1>
            </head>
            <body>
                <div class="desplegable">
                <label for="gradoSelect">Grado:</label>
                <select id="gradoSelect" onchange="updateTable()">
                <?php foreach ($asistencias as $asistencia) : ?>
                    <option value="" disabled selected>Elige un grado</option>
                    <option value="Grado 0">Grado 0</option>
                </select>
                <label for="jornadaSelect">Jornada:</label>
                <select id="jornadaSelect" onchange="updateTable()">
                    <option value="" disabled selected>Elige una jornada</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select>
                <?php endforeach; ?>
                </div>
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Grado</th>
                            <th>Curso</th>
                            <th>Jornada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Las filas de la tabla se llenarán dinámicamente -->
                    </tbody>
                </table>
</main>
             <script src="../java/listados.js"></script>
            
        
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