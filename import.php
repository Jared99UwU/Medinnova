<?php
require 'vendor/autoload.php';

// Conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos y la colección
$database = $mongoClient->selectDatabase('medinnova');
$collection = $database->selectCollection('csv');

// Ruta del archivo CSV
$csvFilePath = 'C:\Users\jared\Downloads\MEDINNOVA_datos.csv'; // Reemplaza con la ruta correcta

// Obtener el contenido del archivo CSV
$csvContent = file_get_contents($csvFilePath);

// Crear un documento con el contenido del CSV
$document = [
    'filename' => basename($csvFilePath),
    'content' => $csvContent,
    
];

// Insertar el documento en la colección
$collection->insertOne($document);

echo 'Archivo CSV guardado en MongoDB.';
?>
