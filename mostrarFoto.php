<?php  
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_alumnos";
    $respuesta =  mysqli_query($conexion, $sql);
    while($mostrar = mysqli_fetch_array($respuesta)) { 
    $idAlumno = $mostrar['id_alumno'];
    $ext = $mostrar['nombre_archivo'];
    $imagen = '';
    $ruta = "../archivos/".$ext;
    $imagen = '<img src="'.$ruta.'" alt="" width="100%" height="100%">';
    echo $imagen;
    }

?>