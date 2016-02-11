<?php

include_once '../pkgModelo/clsConexion.php';

class Estudiante extends Conexion {

    var $codigo;
    var $nombre;
    var $apellido;
    var $cedula;
    var $edad;
    var $semestre;

    public function __Construct($codigo, $nombre, $apellido, $cedula, $edad, $semestre) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->edad = $edad;
        $this->semestre = $semestre;
    }

    public function guardar() {
        $resultado = pg_query($this->acceder_conexion(), "INSERT INTO estudiante(codigo,nombre,apellido,cedula,edad,semestre) VALUES ('" . $this->codigo . "','" . $this->nombre . "','" . $this->apellido . "','" . $this->cedula . "','" . $this->edad . "','" . $this->semestre . "')") or die("Problemas en la consulta: " . pg_last_error());
        $this->respuesta($resultado);        
    }

    public function buscar() {
        $resultado = pg_query($this->acceder_conexion(), "SELECT codigo,nombre,apellido,cedula,edad,semestre from estudiante where codigo='" . $this->codigo . "'") or die("Problemas en la consulta: " . pg_last_error());
        $this->buscaRegistro($resultado);
    }

    public function eliminar() {
        $resultado = pg_query($this->acceder_conexion(), "delete from estudiante where codigo='" . $this->codigo . "'") or die("Problemas en la consulta: " . pg_last_error());
        $this->registrosAfectados($resultado);
    }

    public function modificar() {
        $resultado = pg_query($this->acceder_conexion(), "UPDATE estudiante set nombre='" . $this->nombre . "',apellido='" . $this->apellido . "',cedula='" . $this->cedula . "',edad='" . $this->edad . "',semestre='" . $this->semestre . "' where codigo='" . $this->codigo . "'") or die("Problemas en la consulta: " . pg_last_error());
        
        $this->registrosAfectados($resultado);
    }

    public function listar() {
        $resultado = pg_query($this->acceder_conexion(), "SELECT codigo,nombre,apellido,cedula,edad,semestre from estudiante") or die("Problemas en la consulta: " . pg_last_error());
        $this->listadoRegistro($resultado);
    }

}

?>
