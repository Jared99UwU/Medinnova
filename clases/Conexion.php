<?php
     require_once  $_SERVER['DOCUMENT_ROOT'] . '/crud_mongo/vendor/autoload.php';
    // require_once '../vendor/autoload.php'; // Carga Composer autoloader

     class Conexion{
         public function conectar(){
             try {
                 $servidor = "localhost"; // 127.0.0.1
                 $usuario = "mongoadmin";
                 $password = "1234";
                 $basedatos = "medinnova";
                 $puerto = "27017";
     
                 $conexion = "mongodb://" . 
                                 $usuario . ":" . 
                                 $password . "@" . 
                                 $servidor . ":" . 
                                 $puerto . "/" . 
                                 $basedatos;
     
                 $cliente = new MongoDB\Client($conexion);
                 return $cliente->$basedatos; // Accede a la base de datos directamente
     
             } catch (\Throwable $th) {
                 return $th->getMessage();
             }
         }
     }
     //$objeto = new Conexion();
     //var_dump($objeto->conectar());   
?>