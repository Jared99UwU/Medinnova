<?php
require 'vendor1/autoload.php';
use MongoDB\Client as MongoClient;

$mongoClient = new MongoClient('mongodb://localhost:27017');
$collection = $mongoClient->selectDatabase('medinnova')->selectCollection('imagen');

$imagenes = $collection->find();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Imágenes</title>
</head>
<body>
    <h1>Imágenes almacenadas en MongoDB</h1>
    <a href="webscraping.php" class="btn btn-primary"><i class="fa-solid fa-angles-left"></i> Regresar a Web Scraping</a>
    <hr>

    <?php foreach ($imagenes as $imagen): ?>
        <div>
            <h3>Nombre: <?= $imagen['nombre']; ?></h3>
            <p>URL: <?= $imagen['url']; ?></p>
            <img src="<?= $imagen['imagen']; ?>" alt="<?= $imagen['nombre']; ?>">
        </div>
        <hr>
    <?php endforeach; ?>
   
</body>
</html>

<?php include "./scripts.php"; ?>
