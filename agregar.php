<?php include "./header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">             
                    <h2>Agregar nuevo registro</h2>
                 

                    <form action="./procesos/insertar.php" method="post">
                    <label for="txtNnombre">Nombre del Paciente</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                    <label for="txtMes">Mes Nacimiento</label>
                    <input type="text" class="form-control" id="txtMes" name="txtMes" required>
                    <label for="txtPeso">Peso</label>
                    <input type="text" class="form-control" id="txtPeso" name="txtPeso" required>
                    <label for="txtEstatura">Estatura</label>
                    <input type="text" class="form-control" id="txtEstatura" name="txtEstatura" required>
                    <label for="txtSangre">Tipo de Sangre</label>
                    <input type="text" class="form-control" id="txtSangre" name="txtSangre" required>
                    <label for="txtnoReceta">No. de Receta</label>
                    <input type="text" class="form-control" id="txtnoReceta" name="txtnoReceta" required>
                    
                    <button class="btn btn-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Agregar</button>
                    <div>
                        <div class="mt-3"> 
                            <a href="index.php" class="btn btn-outline-info"> <i class="fa-solid fa-angles-left"></i> Regresar</a>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./scripts.php"; ?>