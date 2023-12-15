<?php
    include "./clases/Conexion.php";
    include "./clases/Crud.php";
    include "./header.php"; 

    $crud = new Crud();
    $id = $_POST['id'];
    $datos = $crud->obtenerDocumentoDoc($id);
    
?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4 fondoDelete" >
                <div class="card-body">
                    <h2>Eliminar registro</h2>
                    <table class="table table-bordered">     <!--table-sm-->
                        <thead>
                            <th>Nombre Doctor</th>
                            <th>Fecha</th>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo isset($datos->nombreDoc) ? $datos->nombreDoc : ''; ?> </td>
                                <td> <?php echo isset($datos->cedula) ? $datos->cedula : ''; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                        <p>¿Esta seguro de querer eliminar este registro?</p>
                        <p>Una vez eliminado no se podra recuperar</p>
                    </div>
                    <form action="./procesos/eliminarDoc.php" method="POST">
                        <input type="text" name="id" value="<?php echo $datos->_id ?>" hidden>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-user-xmark"></i> Eliminar
                        </button>
                    </form>
                    <div>
                            <div class="mt-3"> 
                            <a href="indexDoc.php" class="btn btn-outline-info"> <i class="fa-solid fa-angles-left"></i> Regresar</a>
                            </div>
                        
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./scripts.php"; ?>