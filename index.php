<?php include "header.php"; ?>
<?php
    session_start();
    $operacion = "";
    if (isset($_SESSION['operacion'])) {
        $operacion = $_SESSION['operacion'];
        unset($_SESSION['operacion']);
    }
?>
<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-2">
        <div class="card-body p-5">
            <h1 class="fw-light">Registro de Alumnos de Sistemas (Los mejores!)</h1>
            <p class="lead">
            <div class="row">
                <div class="col-sm-12">
                    <form action="servidor/agregarAlumno.php" enctype="multipart/form-data" method="POST">
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" required class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="apellidoA">Apellido Paterno</label>
                                <input type="text" name="apellidoA" id="apellidoA" required class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="apellidoM">Apellido Materno</label>
                                <input type="text" name="apellidoM" id="apellidoM" required class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label for="matricula">Matricula</label>
                                <input type="text" name="matricula" id="matricula" required class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="fecha">Seleccionar Fecha</label>
                                <input type="date" required class="form-control" name="fecha" id="fecha">
                            </div>
                            <div class="col-sm-4">
                                <label for="especialidad">Especialidad</label>
                                <input type="text" name="especialidad" id="especialidad" required class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo" required class="form-control">
                                    <option value="mujer">Mujer</option>
                                    <option value="hombre">Hombre</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="imagen">Imagen de perfil</label>
                                <input type="file" id="imagen" name="imagen" required class="form-control">
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-sm-12">
                    <div id="tablaAlumnos"></div>
                </div>
            </div>
            </p>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
<script>
let operacion = "<?php echo $operacion; ?>";

if (operacion == "insert") {
    Swal.fire(":D", "Agregado con exito!", "success");
} else if (operacion == "error") {
    Swal.fire(":(", "Error al agregar!", "error");
} else if (operacion == "delete") {
    Swal.fire(":D", "Eliminado con exito!", "info");
} else if (operacion == "error2") {
    Swal.fire(":(", "Error al eliminar!", "error");
}
</script>
<script>
$(document).ready(function() {
    $('#tablaAlumnos').load('tablaAlumnos.php');
});
</script>