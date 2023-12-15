<?php
    include "./clases/Conexion.php";
    include "./clases/Crud.php";
    include "./header.php"; 

    $crud = new Crud();
    $id = $_POST['id'];
    $datos = $crud->obtenerDocumento($id);
?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4 fondoDelete" >
                <div class="card-body">
                    <h2>Eliminar registro</h2>
                    <table class="table table-bordered">     <!--table-sm-->
                        <thead>
                            <th>Nombre Paciente</th>
                            <th>Fecha</th>
                            <th>Peso</th>
                            <th>Estatura</th>
                            <th>Tipo de Sangre</th>
                            <th>No. de Receta</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo isset($datos->nombre_paciente) ? $datos->nombre_paciente : ''; ?> </td>
                                <td> <?php echo isset($datos->mes) ? $datos->mes : ''; ?> </td>
                                <td> <?php echo isset($datos->peso) ? $datos->peso : ''; ?> </td>
                                <td> <?php echo isset($datos->estatura) ? $datos->estatura : ''; ?> </td>
                                <td> <?php echo isset($datos->tipo_sangre) ? $datos->tipo_sangre : ''; ?> </td>
                                <td> <?php echo isset($datos->noReceta) ? $datos->noReceta : ''; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                        <p>¿Esta seguro de querer eliminar este registro?</p>
                        <p>Una vez eliminado no se podra recuperar</p>
                    </div>
                    <form action="./procesos/eliminar.php" method="POST">
                        <input type="text" name="id" value="<?php echo $datos->_id ?>" hidden>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-user-xmark"></i> Eliminar
                        </button>
                    </form>
                    <div>
                            <div class="mt-3"> 
                            <a href="index.php" class="btn btn-outline-info"> <i class="fa-solid fa-angles-left"></i> Regresar</a>
                            </div>
                        
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./scripts.php"; ?>