<?php
    session_start();
    include "funciones.php";
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoA'];
    $apellidoMaterno = $_POST['apellidoM'];
    $matricula = $_POST['matricula'];
    $fechaNacimiento = $_POST['fecha'];
    $especialidad = $_POST['especialidad'];
    $sexo = $_POST['sexo'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $extension = explode(".", $nombre_archivo);
    $extension = $extension[1];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDeServidor = "../archivos/";

    //subir un archivo
    //move_uploaded_file nos retorna un 1 si se subio y un 0 si no se subio

    if (move_uploaded_file($rutaTemporal, $rutaDeServidor . $nombre_archivo)) {
        $insertarEnBD = agregarReferenciaArchivo($nombre, $nombre_archivo, $apellidoPaterno, $apellidoMaterno,
        $matricula, $fechaNacimiento,$especialidad, $sexo, $extension);
        if ($insertarEnBD) {
            $_SESSION['operacion'] = "insert";
        } else {
            $_SESSION['operacion'] = "error";
        }
    } else {
        $_SESSION['operacion'] = "error";
    }

    header("location:../index.php");