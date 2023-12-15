<?php
require 'funciones.php';

// Tu conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);

    if ($url) {
        // Crear una nueva instancia de Goutte\Client
        $client = new Goutte\Client();

        // Obtener los enlaces de las imágenes de la página
        $data = recupera_links($client, $url);

        // Descargar cada imagen y guardar en la colección "imagen" en MongoDB
        foreach ($data as $valor) {
            descargar_imagen_y_guardar_en_mongo_imagen($client, $valor, $mongoClient);
        }
    } else {
        echo 'URL no válida';
    }
}

// Resto del código HTML y scripts
include "./header.php";
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <a href="index.php" class="btn btn-outline-info"> <i class="fa-solid fa-angles-left"></i>
                        Regresar</a>
                    <h2>WebScraping</h2>

                    <!-- Formulario para ingresar la URL -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="nombre">URL de la pagina</label>
                        <input type="text" class="form-control" id="url" name="url">
                        <button class="btn btn-primary mt-3"><i class="fa-solid fa-download"></i> Descargar</button>

                        <div>
                            <div class="mt-3">

                                <a href="ver_imagenes.php" class="btn btn-success"><i class="fa-regular fa-image"></i> Ver Imagenes</a>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aquí incluyes tus scripts -->
<?php include "./scripts.php"; ?>