<?php
    session_start();

    require_once ('./clases/Conexion.php');
    require_once './clases/Crud.php';
    $crud = new Crud();
    $datos = $crud->mostrarDatosDoc();
   
   
    //print_r($datos);
?>

<?php include "./header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col">
        <?php
                 if (isset($_SESSION['mensaje_crud'])) {
                    $mensaje = $_SESSION['mensaje_crud'];
                   
                    // Limpia la variable de sesión después de usarla
                    unset($_SESSION['mensaje_crud']);
                
                    // Muestra la alerta según el mensaje
                    if ($mensaje === 'El registro del doctor tiene registros de pacientes!.') {
                        // Muestra la alerta de advertencia
                        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                <p>Error al borrar el registro</p>
                                <p>El doctor no puede ser eliminado porque tiene pacientes </p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>';
                    }
                }
            ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Doctores</h2>
                    <a href="./index.php" class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Pacientes
                    </a>
                    <a href="./agregarDoc.php" class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Agregar un Doctor
                    </a>
                    <hr>
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <!--<th>id</th>-->
                            <th>Nombre doctor</th>
                            <th>Cedula profesional</th>
                        </thead>
                        <?php 
                            foreach($datos as $item) {
                        ?>
                        <tbody>
                            <tr>
                                <td> <?php echo isset($item->nombreDoc) ? $item->nombreDoc : ''; ?> </td>
                                <td> <?php echo isset($item->cedula) ? $item->cedula : ''; ?> </td>
                              
                                <td class="text-center">
                                    <form action="./actualizarDoc.php" method="POST">
                                        
                                    <input type="hidden" name="id" value="<?php echo $item->_id ?>">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="./eliminarDoc.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $item->_id ?>">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-user-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "./scripts.php"; ?>