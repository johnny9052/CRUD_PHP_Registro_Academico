<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="pkgVista/js/gestionEstudiantes.js"></script>
    </head>    
    <body>

        <form name="f1" method="post" action="pkgControlador/gestionEstudiante.php">
            <table border="0">
                <tr>
                    <td>
                        <label>Codigo</label>                        
                    </td>
                    <td>
                        <input type="text" id="txtCodigo" name="codigo">
                    </td> 

                    <td rowspan="10" style="width: 600px">
                        <?php
                        if (isset($_GET['tabla'])) {
                            echo $_GET['tabla'];
                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nombre</label>                        
                    </td>
                    <td>
                        <input type="text" id="txtNombre" name="nombre">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Apellido</label>                        
                    </td>
                    <td>
                        <input type="text" id="txtApellido" name="apellido">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Cedula</label>                        
                    </td>
                    <td>
                        <input type="text" id="txtCedula" name="cedula">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Edad</label>                        
                    </td>
                    <td>
                        <input type="text" id="txtEdad" name="edad">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Semestre</label>                        
                    </td>
                    <td>
                        <input type="text" id="txtSemestre" name="semestre">
                    </td>
                </tr>
                <tr>
                    <td>                        
                        <input type="text" id="txtType" name="type"  style="display: none">
                    </td>
                    <td>
                        <input type="button" value="Guardar" id="btnGuardar" onclick="validar(f1,'save');">
                        <input type="button" value="Buscar" id="btnBuscar" onclick="validar(f1,'search');">                    
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="button" value="Modificar" id="btnModificar" onclick="validar(f1,'update');">
                        <input type="button" value="Eliminar" id="btnEliminar" onclick="validar(f1,'delete');">
                    </td>
                </tr>

                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="button" value="Listar" id="btnListar" onclick="validar(f1,'list');">                       
                    </td>
                </tr>

            </table>


            <?php
            if (isset($_GET['dato'])) {
                echo $_GET['dato'];
            }

            if (isset($_GET['datos'])) {
                echo "<script languaje='javascript'>" . $_GET['datos'] . "</script>";
            }
            ?>

        </form>
    </body>
</html>
