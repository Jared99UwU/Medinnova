<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un archivo
    if (isset($_FILES["fileInput"]) && $_FILES["fileInput"]["error"] == UPLOAD_ERR_OK) {
        $fileContent = file_get_contents($_FILES["fileInput"]["tmp_name"]);

        // Analizar el contenido del archivo
        list($headers, $data) = parseFileContent($fileContent);

        // Mostrar la tabla con los datos obtenidos
        echo '<table border="1">';
        
        // Mostrar encabezados
        echo '<tr>';
        foreach ($headers as $header) {
            echo '<th>' . $header . '</th>';
        }
        echo '</tr>';

        // Mostrar datos
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }

        echo '<tr>';
        foreach ($headers as $header) {
            echo '<td>' . $header . '</td>';
        }
        echo '</tr>';
        echo '</table>';

        // Guardar en MongoDB
        saveToMongoDB($headers, $data);
    } else {
        echo "Error al cargar el archivo.";
    }

    echo '<div class="alert alert-dark">
        <a href="./index.php" class="badge badge-light"> Regresar</a>
    </div>';
}

function saveToMongoDB($headers, $data) {
    // Conexión a MongoDB
    $mongoClient = new MongoDB\Client('mongodb://localhost:27017');

    // Seleccionar la base de datos y colección
    $databaseName = 'medinnova';
    $collectionName = 'csv';

    $database = $mongoClient->selectDatabase($databaseName);
    $collection = $database->selectCollection($collectionName);

    // Insertar datos en MongoDB
    foreach ($data as $row) {
        $document = [];
        foreach ($headers as $index => $header) {
            $document[$header] = $row[$index];
        }
        $collection->insertOne($document);
    }

    echo 'Datos almacenados en MongoDB.';
}

function parseFileContent($content) {
    // Lógica para analizar el contenido del archivo (ajústala según tu estructura de datos)
    $lines = explode("\n", $content);
    $headers = [];
    $data = [];

    foreach ($lines as $i => $line) {
        $columns = explode(",", $line); // Suponiendo que las columnas están separadas por comas

        if ($i === 0) {
            // La primera línea es el encabezado
            $headers = $columns;
        } else {
            // Las líneas siguientes son datos
            $row = [];
            foreach ($columns as $column) {
                $row[] = $column;
            }
            $data[] = $row;
        }
    }

    return [$headers, $data];
}
?>
