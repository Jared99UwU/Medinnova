<?php include "./header.php"; ?>
<?php
include "./clases/Conexion.php";
include "./clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);
$idMongo = $datos->_id;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">

                    <h2>Actualizar registro</h2>

                    <form action="./procesos/actualizar.php" method="POST">
                        <input type="text" hidden value="<?php echo $idMongo ?>" name="id">
                        <label for="txtNnombre">Nombre del Paciente</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                            value="<?php echo isset($datos->nombre_paciente) ? $datos->nombre_paciente : ''; ?>">
                        <label for="txtMes">Mes</label>
                        <input type="text" class="form-control" id="txtMes" name="txtMes"
                            value="<?php echo isset($datos->mes) ? $datos->mes : ''; ?>">
                        <label for="txtPeso">Peso</label>
                        <input type="text" class="form-control" id="txtPeso" name="txtPeso"
                            value="<?php echo isset($datos->peso) ? $datos->peso : ''; ?>">
                        <label for="txtEstatura">Estatura</label>
                        <input type="text" class="form-control" id="txtEstatura" name="txtEstatura"
                            value="<?php echo isset($datos->estatura) ? $datos->estatura : ''; ?>">
                        <label for="txtSangre">Tipo de Sangre</label>
                        <input type="text" class="form-control" id="txtSangre" name="txtSangre"
                            value="<?php echo isset($datos->tipo_sangre) ? $datos->tipo_sangre : ''; ?>">
                        <label for="txtnoReceta">No. de Receta</label>
                        <input type="text" class="form-control" id="txtnoReceta" name="txtnoReceta"
                            value="<?php echo isset($datos->noReceta) ? $datos->noReceta : ''; ?>">
                        <button class="btn btn-warning mt-3"><i class="fa-solid fa-pen-to-square"></i>
                            Actualizar</button>



                        <div>
                            <div class="mt-3">
                                <a href="index.php" class="btn btn-outline-info"> <i
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