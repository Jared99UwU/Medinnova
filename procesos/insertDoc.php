<?php
    include '../clases/Conexion.php';
    include '../clases/Crud.php';

    $Crud = new Crud();

    $datos= array (
        "nombreDoc" => $_POST['txtNombre'],
        "cedula" => $_POST['txtCel'],
    );

    $respuesta = $Crud->insertarDatosDoc($datos);

    if ($respuesta->getInsertedId() > 0) {
        $_SESSION['mensaje_crud'] = 'insert';
        header("location:../indexDoc.php"); 
    } else {
        print_r($respuesta);
    }

?>