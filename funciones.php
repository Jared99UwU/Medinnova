<?php
require 'vendor1/autoload.php'; // Asegúrate de tener la ruta correcta al archivo autoload.php
use Goutte\Client;
use MongoDB\Client as MongoClient;

$client = new Client();
$mongoClient = new MongoClient('mongodb://localhost:27017');

// Resto de tu código ...

function nombre($url) {
    $parsedUrl = parse_url($url);
    $pathParts = pathinfo($parsedUrl['path']);
    $nombre = $pathParts['filename'] . '.' . $pathParts['extension'];

    return $nombre !== false ? $nombre : '';
}

function connexion_pagina(Client $client, $url, $op) {
    $peticion = $client->request("GET", $url);
    if ($op == 1) {
        return $contenido = $peticion->html();
    } else if ($op == 2) {
        $contenido = $peticion->html();
        return $html = str_get_html($contenido);
    }
}

function recupera_links(Client $client, $url) {
    $content = connexion_pagina($client, $url, 1);
    $images = array();
    $img = 'data-zoom="';

    while (strpos($content, $img)) {
        $possible_url = substr($content, strpos($content, $img) + strlen($img));
        $pos_final = strpos($possible_url, '"');
        $possible_url = substr($possible_url, 0, $pos_final);
        $content = substr($content, strpos($content, $img) + 1);
        $images[] = $possible_url;
    }

    return $images;
}

function descargar_imagen($client, $url, $mongoClient) {
    $nombre = nombre($url);

    if ($nombre) {
        $ruta_local = 'imagenes/' . $nombre;

        if (!file_exists('imagenes')) {
            mkdir('imagenes', 0777, true);
        }

        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        $contenido_imagen = file_get_contents($url, false, $context);

        if ($contenido_imagen !== false) {
            if (file_put_contents($ruta_local, $contenido_imagen) !== false) {
                echo 'La imagen se ha descargado correctamente.';
                // Guardar en la colección "imagen" en MongoDB
                guardar_en_mongo_imagen($nombre, $url, $ruta_local, $mongoClient);
            } else {
                echo 'No se pudo guardar la imagen en el archivo local.';
            }
        } else {
            echo 'No se pudo obtener el contenido de la imagen desde la URL.';
        }
    } else {
        echo 'No se pudo obtener el nombre de la imagen.';
    }
}

function guardar_en_mongo_imagen($nombre, $url, $ruta_local, $mongoClient) {
    $collection = $mongoClient->selectDatabase('medinnova')->selectCollection('imagen');

    $document = [
        'nombre' => $nombre,
        'url' => $url,
        'imagen' => $ruta_local,
    ];

    $collection->insertOne($document);

    echo 'La información se ha guardado en la colección "imagen" en MongoDB.';
}

function descargar_imagen_y_guardar_en_mongo_imagen($client, $url, $mongoClient) {
    $nombre = nombre($url);

    if ($nombre) {
        $ruta_local = 'imagenes/' . $nombre;

        if (!file_exists('imagenes')) {
            mkdir('imagenes', 0777, true);
        }

        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        $contenido_imagen = file_get_contents($url, false, $context);

        if ($contenido_imagen !== false) {
            if (file_put_contents($ruta_local, $contenido_imagen) !== false) {
                echo 'La imagen se ha descargado correctamente.';
                // Guardar en la colección "imagen" en MongoDB
                guardar_en_mongo_imagen($nombre, $url, $ruta_local, $mongoClient);
            } else {
                echo 'No se pudo guardar la imagen en el archivo local.';
            }
        } else {
            echo 'No se pudo obtener el contenido de la imagen desde la URL.';
        }
    } else {
        echo 'No se pudo obtener el nombre de la imagen.';
    }
}
