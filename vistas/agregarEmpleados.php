<?php
include('../conexion/conexion.php');
include('../modelos/empleadosModelo.php');
?>
<?php
$obj = new Empleados();
if ($_POST) {
    $obj->numeroDocumento = $_POST['numeroDocumento'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->idCargo = $_POST['idCargo'];
    $obj->nombreEmpleado = $_POST['nombreEmpleado'];
    $obj->apellidoEmpleado = $_POST['apellidoEmpleado'];
    $obj->telefonoEmpleado = $_POST['telefonoEmpleado'];
    $obj->emailEmpleado = $_POST['emailEmpleado'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
}
?>
<?php
//Consulta para el menu desplegable
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from documentos";
$resultado4 = mysqli_query($conecta, $query);
$arreglo4 = mysqli_fetch_assoc($resultado4);


?>
<?php
//Consulta para el menu desplegable
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from cargo";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_assoc($resultado);


?>
<?php
//Consulta para el menu desplegable Ubicacion
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from asignacionempleados";
$resultado2 = mysqli_query($conecta,$query);
$arreglo2 = mysqli_fetch_assoc($resultado2);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <script src="../js/validaciones.js"></script>
    <title>Empleados</title>
</head>

<body>
    <div id="main-container">
        <form action="" name="empleados" id="empleados" method="POST">
            <h1>Crear Empleado</h1>
            <table>
                <tr>
                    <th>Numero Documento</th>
                    <td><input type="text" name="numeroDocumento" id="numeroDocumento"
                            placeholder="Digite el Documento del Empleado" size="30"></td>

                    <th>Seleccione el Tipo de Documento</th>
                    <td><select name="codigoDocumento" id="codigoDocumento">
                            <option>Seleccione el Tipo de Documento</option>
                            <option>
                                <?php
                                do {
                                    $identidad2 = $arreglo4['codigoDocumento'];
                                    $nombre2 =  $arreglo4['nombreDocumento'];
                                    if ($identidad2 == $obj->codigoDocumento) {
                                        echo "<option value=$identidad2=>$nombre2";
                                    } else {
                                        echo "<option value=$identidad2>$nombre2";
                                    }
                                } while ($arreglo4 = mysqli_fetch_assoc($resultado4));
                                $row = mysqli_num_rows($resultado4);
                                $rows = 0;
                                if ($rows > 0) {
                                    mysqli_data_seek($arreglo4,0);
                                    $arreglo4 = mysqli_fetch_assoc($resultado4);
                                }
                                ?>
                            </option>
                        </select> </td>
                </tr>
                <tr>
                    <th>Seleccione el Cargo</th>
                    <td><select name="idCargo" id="idCargo">
                            <option>Seleccione el Cargo</option>
                            <option>
                                <?php
                                do {
                                    $identidad = $arreglo['idCargo'];
                                    $nombre =  $arreglo['nombreCargo'];
                                    if ($identidad == $obj->idCargo) {
                                        echo "<option value=$identidad=>$nombre";
                                    } else {
                                        echo "<option value=$identidad>$nombre";
                                    }
                                } while ($arreglo = mysqli_fetch_assoc($resultado));
                                $row = mysqli_num_rows($resultado);
                                $rows = 0;
                                if ($rows > 0) {
                                    mysqli_data_seek($arreglo,0);
                                    $arreglo = mysqli_fetch_assoc($resultado);
                                }
                                ?>
                            </option>
                        </select> </td>
                    <th>Nombre</th>
                    <td><input type="text" name="nombreEmpleado" id="nombreEmpleado"
                            placeholder="Digite el Nombre del Empleado" size="45"></td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td><input type="text" name="apellidoEmpleado" id="apellidoEmpleado"
                            placeholder="Digite el Apellido del Empleado" size="45"></td>

                    <th>Telefono</th>
                    <td><input type="text" name="telefonoEmpleado" id="telefonoEmpleado"
                            placeholder="Digite el Telefono del Empleado" size="45"></td>
                </tr>
                <tr>
                    <th>Correo Electronico</th>
                    <td><input type="text" name="emailEmpleado" id="emailEmpleado"
                            placeholder="Digite el Correo del Empleado" size="45"></td>
                    <th>Seleccione la ubicación</th>

                    <td>
                        <select name="idAsignacionEmpleados" id="idAsignacionEmpleados">
                            <option>Seleccione la Ubicación</option>
                            <option>
                                <?php
                                do {
                                    $identidad1 = $arreglo2['idAsignacionEmpleados'];
                                    $nombre1 =  $arreglo2['Ubicacion'];
                                    if ($identidad1 == $obj->idAsignacionEmpleados) {
                                        echo "<option value=$identidad1=>$nombre1";
                                    } else {
                                        echo "<option value=$identidad1>$nombre1";
                                    }
                                } while ($arreglo2 = mysqli_fetch_assoc($resultado2));
                                $row = mysqli_num_rows($resultado2);
                                $rows = 0;
                                if ($rows>0) {
                                    mysqli_data_seek($arreglo2,0);
                                    $arreglo = mysqli_fetch_assoc($resultado2);
                                }
                                ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="4">
                        <center>
                        <button class="btn1" name="agregar" type="submit" onClick="return validarEmpleado(this.form)">
                            Guardar</button>
                        <a href="empleados.php">
                            <button  class="btn2" name="salir" type="button">Salir</button>
                        </a>
                        </center>
                    </th>
                </tr>

            </table>


        </form>
    </div>

</body>

</html>