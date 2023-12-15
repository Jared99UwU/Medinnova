<?php session_start();
    include "../clases/Conexion.php";
    include "../clases/Crud.php";

    $Crud = new Crud();

    $id = $_POST['id'];
    $datos = array(
        "nombreDoc" => $_POST['txtNombre'],
        "cedula" => $_POST['txtCel'],
    );

    $respuesta = $Crud->actualizarDoc($id, $datos);

    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        $_SESSION['mensaje_crud'] = 'update';
        header("location:../indexDoc.php");
    } else {
        print_r($respuesta);
    }

?>