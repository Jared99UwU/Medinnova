<?php 
    include "./header.php"; 
    require_once ('./clases/Conexion.php');
    require_once './clases/Crud.php';
    $crud = new Crud();
    $datos = $crud->mostrarDatosDoc();
    //print_r($datos);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Agregar nuevo Doctor</h2>

                    <form action="./procesos/insertDoc.php" method="post">
                        <label for="txtNnombre">Nombre del Doctor</label>
                        <input required type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                        <label for="txtCel">No Cedula</label>
                        <input required type="text" class="form-control" id="txtCel" name="txtCel" required>
                        <button class="btn btn-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Agregar</button>
                        <div>
                            <div class="mt-3">
                                <a href="indexDoc.php" class="btn btn-outline-info"> <i
                                        class="fa-solid fa-angles-left"></i> Regresar</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./scripts.php"; ?>