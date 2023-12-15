<?php 
	include "./clases/Conexion.php";
	include "./clases/Crud.php";

	$crud = new Crud();

	$id = $_POST['id'];
	$datos = $crud->obtenerDocumentoDoc($id);
	$idMongo = $datos->_id;
?>
<?php include "./header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    
                    <h2>Actualizar Doctor</h2>

                   <form action="./procesos/actualizarDoc.php" method="POST">
                        <input type="hidden" value="<?php echo $idMongo ?>" name="id">
                        <label for="txtNnombre">Nombre del Doctor</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo isset($datos->nombreDoc) ? $datos->nombreDoc : ''; ?>">
                        <label for="txtCel">No. Cedula</label>
                        <input type="text" class="form-control" id="txtCel" name="txtCel" value="<?php echo isset($datos->cedula) ? $datos->cedula : ''; ?>">
                        <button class="btn btn-warning mt-3"><i class="fa-solid fa-pen-to-square"></i> Actualizar</button>
                        <div>
                            <div class="mt-3"> 
                                <a href="indexDoc.php" class="btn btn-outline-info"> <i class="fa-solid fa-angles-left"></i> Regresar</a>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./scripts.php"; ?>