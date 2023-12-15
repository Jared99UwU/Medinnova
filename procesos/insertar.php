<?php
    include '../clases/Conexion.php';
    include '../clases/Crud.php';

    $Crud = new Crud();

    $datos= array (
        "nombre_paciente" => $_POST['txtNombre'],
        "mes" => $_POST['txtMes'],
        "peso" => $_POST['txtPeso'],
        "estatura" => $_POST['txtEstatura'],
        "tipo_sangre" => $_POST['txtSangre'],
        "noReceta" => $_POST['txtnoReceta'],
        "id_doctor" => "657b3f2959b92294ab0aca0b",
    );

    $respuesta = $Crud->insertarDatos($datos);

    if ($respuesta->getInsertedId() > 0) {
        $_SESSION['mensaje_crud'] = 'insert';
        header("location:../index.php"); 
    } else {
        print_r($respuesta);
    }

?>