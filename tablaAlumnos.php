<?php 
    session_start();
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_alumnos";
    $respuesta =  mysqli_query($conexion, $sql);
?>

<table class="table table-bordered table-striped" id="tablaPersonas">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>A.Paterno</th>
        <th>A.Materno</th>
        <th>Edad</th>
        <th>Matricula</th>
        <th>Especialidad</th>
        <th>Sexo</th>
        <th>Perfil</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) { 
                
        ?>
        <tr>
            <td><?php echo $idAlumno = $mostrar['id_alumno']; ?></td>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['apellidoPaterno']; ?></td>
            <td><?php echo $mostrar['apellidoMaterno']; ?></td>
            <td><?php
                    $fecha_nacimiento = new DateTime($mostrar['fechaNacimiento']);
                    $hoy = new DateTime();
                    $edad = $hoy->diff($fecha_nacimiento);
                    echo $edad->y;
                ?>
            </td>
            <td><?php echo $mostrar['matricula']; ?></td>
            <td><?php echo $mostrar['especialidad']; ?></td>
            <td><?php echo $mostrar['sexo']; ?></td>
            <td>
            <?php
                $ext = $mostrar['extension'];
                $imagen = '';
                
                if ($ext == "jpg" || $ext == "JPG") {
                    $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre_archivo'] . ' width="50px" height="50px">';
                    echo '<a href="mostrarFoto.php?nombre=' . $mostrar['nombre_archivo'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                } else if ($ext == "png" || $ext == "PNG") {
                    $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre_archivo'] . ' width="50px" height="50px">';
                    echo '<a href="mostrarFoto.php?nombre=' . $mostrar['nombre_archivo'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                }else if ($ext == "jpeg" || $ext == "JPEG") {
                    $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre_archivo'] . ' width="50px" height="50px">';
                    echo '<a href="mostrarFoto.php?nombre=' . $mostrar['nombre_archivo'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                }
            ?>
            
            </td>
            <td>
                <form action="servidor/eliminarAlumno.php" method="POST">
                    <input type="text" hidden name="idAlumno" value="<?php echo $idAlumno; ?>">
                    <button class="btn btn-danger"><span class="far fa-trash-alt"></span></button>
                </form>
            </td>

        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPersonas').DataTable();
	});
</script>