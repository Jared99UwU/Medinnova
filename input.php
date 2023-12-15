<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivo de Texto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cargar Archivo de Texto</h1>
        <form action="process_file.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileInput" accept=".txt, .doc, .docx, .csv">
            <button type="submit">Cargar Archivo</button>
        </form>
        <table id="dataTable">
            <!-- La tabla se llenará con los datos obtenidos del archivo mediante PHP -->
        </table>
    </div>

    
</body>
</html>

<?php include "./scripts.php"; ?>
