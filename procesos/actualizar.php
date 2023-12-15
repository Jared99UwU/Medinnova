<?php session_start();
    include "../clases/Conexion.php";
    include "../clases/Crud.php";

    $Crud = new Crud();

    $id = $_POST['id'];
    $datos = array(
        "nombre_paciente" => $_POST['txtNombre'],
        "mes" => $_POST['txtMes'],
        "peso" => $_POST['txtPeso'],
        "estatura" => $_POST['txtEstatura'],
        "tipo_sangre" => $_POST['txtSangre'],
        "noReceta" => $_POST['txtnoReceta'],
    );

    $respuesta = $Crud->actualizar($id, $datos);

    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        $_SESSION['mensaje_crud'] = 'update';
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }

?>