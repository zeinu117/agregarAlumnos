<?php

    include "conexion.php";

    function agregarReferenciaArchivo($nombre, $nombre_archivo, $apellidoPaterno, $apellidoMaterno,
                                    $matricula, $fechaNacimiento,$especialidad, $sexo, $extension) {
        $conexion = conexion();
        $sql = "INSERT INTO t_alumnos (nombre,
                                        nombre_archivo,
                                        apellidoPaterno,
                                        apellidoMaterno,
                                        matricula,
                                        fechaNacimiento,
                                        especialidad,
                                        sexo,
                                        extension) 
                VALUES ('$nombre',
                        '$nombre_archivo', 
                        '$apellidoPaterno',
                        '$apellidoMaterno',
                        '$matricula',
                        '$fechaNacimiento',
                        '$especialidad',
                        '$sexo',
                        '$extension')";
        $respuesta = mysqli_query($conexion, $sql);

        return $respuesta;
    }