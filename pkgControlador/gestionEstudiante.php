<?php

include '../pkgModelo/clsEstudiante.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$edad = $_POST['edad'];
$semestre = $_POST['semestre'];

$conex = new Estudiante($codigo, $nombre, $apellido, $cedula, $edad, $semestre);
$conex->conectar();

if ($_POST['type'] == 'save') {
    $conex->guardar();
}

if ($_POST['type'] == 'delete') {
    $conex->eliminar();
}

if ($_POST['type'] == 'update') {
    $conex->modificar();
}

if ($_POST['type'] == 'search') {
    $conex->buscar();
}

if ($_POST['type'] == 'list') {
    $conex->listar();
}



    

