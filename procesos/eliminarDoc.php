<?php
session_start();
include "../clases/Conexion.php";
include "../clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];

// Verifica si existen relaciones antes de eliminar
if ($crud->tieneRelacion($id)) {
    $_SESSION['mensaje_crud'] = 'El registro del doctor tiene registros de pacientes!.';
    header("location:../indexDoc.php");
} else {
    $respuesta = $crud->eliminarDoc($id);

    if ($respuesta->getDeletedCount() > 0) {
        $_SESSION['mensaje_crud'] = 'delete';
        header("location:../indexDoc.php");
    } else {
        print_r($respuesta);
    }
}
?>