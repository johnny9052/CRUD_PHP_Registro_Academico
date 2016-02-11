<?php

abstract class Conexion {

    private $usuario;
    private $password;
    private $database;
    private $puerto;
    private $host;
    private $cadenaconexion;
    private $connect;

    public function conectar() {
        $this->usuario = "postgres";
        $this->password = "admin";
        $this->database = "registroAcademico";
        $this->puerto = 5432;
        $this->host = "localhost";
        $this->cadenaconexion = "host=$this->host port=$this->puerto dbname=$this->database user=$this->usuario password=$this->password";

        $this->connect = pg_connect($this->cadenaconexion) or die("Error al realizar la conexion");
    }

    public function acceder_conexion() {
        return $this->connect;
    }

    function respuesta($resultado) {
        if ($resultado) {
            $mensaje = "Operacion exitosa";
        } else {
            $mensaje = "Error en la operacion";
        }
        header('location:../Index.php?dato=' . $mensaje);
    }

    function registrosAfectados($resultado) {
        if (pg_affected_rows($resultado)) {
            $mensaje = "Operacion exitosa";
        } else {
            $mensaje = "Error en la operacion";
        }
        header('location:../Index.php?dato=' . $mensaje);
    }

    function buscaRegistro($resultado) {

        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = $lista . " document.getElementById('txtCodigo').value='" . $vec[0] . "';";
            $lista = $lista . " document.getElementById('txtNombre').value='" . $vec[1] . "';";
            $lista = $lista . " document.getElementById('txtApellido').value='" . $vec[2] . "';";
            $lista = $lista . " document.getElementById('txtCedula').value='" . $vec[3] . "';";
            $lista = $lista . " document.getElementById('txtEdad').value='" . $vec[4] . "';";
            $lista = $lista . " document.getElementById('txtSemestre').value='" . $vec[5] . "';";
            header('location:../Index.php?datos=' . $lista);
        } else {
            $mensaje = "no se encontro informacion";
            header('location:../Index.php?dato=' . $mensaje);
        }
    }

    function listadoRegistro($resultado) {

        if ($resultado && pg_numrows($resultado) > 0) {

            $cadenaHTML = "<table border='1'>";

            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>Codigo</th>";
            $cadenaHTML .= "<th>Nombre</th>";
            $cadenaHTML .= "<th>Apellido</th>";
            $cadenaHTML .= "<th>Cedula</th>";
            $cadenaHTML .= "<th>Edad</th>";
            $cadenaHTML .= "<th>Semestre</th>";
            $cadenaHTML .= "</tr>";

            for ($cont = 0; $cont < pg_numrows($resultado); $cont++) {

                $cadenaHTML.="<tr>";
                $cadenaHTML.="<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML.="<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML.="<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML.="<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML.="<td>" . pg_result($resultado, $cont, 4) . "</td>";
                $cadenaHTML.="<td>" . pg_result($resultado, $cont, 5) . "</td>";
                $cadenaHTML.="</tr>";
            }

            $cadenaHTML.="</table>";
        } else {
            $cadenaHTML = "<b>No hay registros en la base de datos</b>";
        }

        header('location:../Index.php?tabla=' . $cadenaHTML);
    }

}

?>