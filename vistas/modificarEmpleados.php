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
    $obj->telefonoEmpleado   = $_POST['telefonoEmpleado'];
    $obj->emailEmpleado  = $_POST['emailEmpleado'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from empleados where numeroDocumento= '$llave'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->numeroDocumento = $arreglo[0];
$obj->codigoDocumento= $arreglo[1];
$obj->idCargo = $arreglo[2];
$obj->nombreEmpleado   = $arreglo[3];
$obj->apellidoEmpleado = $arreglo[4];
$obj->telefonoEmpleado = $arreglo[5];
$obj->emailEmpleado  = $arreglo[6];
$obj->idAsignacionEmpleados = $arreglo[7];

?>
<?php
//Consulta para el menu desplegable Documento
$clas = new Conexion();
$conecta = $clas->conectando();
$query6 = "select * from documentos";
$resultado2 = mysqli_query($conecta, $query6);
$arreglo2 = mysqli_fetch_assoc($resultado2);

?>
<?php
//Consulta para el menu desplegable cargo
$clas = new Conexion();
$conecta = $clas->conectando();
$query4 = "select * from cargo";
$resultado4 = mysqli_query($conecta, $query4);
$arreglo4 = mysqli_fetch_assoc($resultado4);

?>
<?php
//Consulta para el menu desplegable ubicacion
$clas = new Conexion();
$conecta = $clas->conectando();
$query5 = "select * from asignacionempleados";
$resultado5 = mysqli_query($conecta, $query5);
$arreglo5 = mysqli_fetch_assoc($resultado5);

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
            <h1>Modificar Empleados</h1>
            <table>
                <tr>
                    <th>Numero Documento</th>
                    <td><input type="text" name="numeroDocumento" id="numeroDocumento"
                            value="<?php echo $obj->numeroDocumento ?>" readOnly
                            placeholder="Digite el Documento del Empleado" size="30"></td>
                    
                    <th>Seleccione el Documento</th>
                    <td>
                        <select name="codigoDocumento" id="codigoDocumento">
                            <?php
                                $clas = new Conexion();
                                $conecta = $clas->conectando();
                                $query1 = "SELECT * from documentos where codigoDocumento='$obj->codigoDocumento'";
                                $res=mysqli_query($conecta,$query1);
                                $a=mysqli_fetch_assoc($res);
                                $identidad= $a['codigoDocumento'];
                                $nombre= $a['nombreDocumento'];
                                if($identidad == $obj->codigoDocumento){
                                    echo "<option value =$identidad>$nombre";
                                }
                                ?>
                            <?php
                                do {
                                    $identidad = $arreglo2['codigoDocumento'];
                                    $nombre = $arreglo2['nombreDocumento'];
                                    if ($identidad== $obj->codigoDocumento) {
                                        echo "<option value=$identidad=>$nombre";
                                    } else {
                                        echo "<option value=$identidad>$nombre";
                                    }
                                } while ($arreglo2 = mysqli_fetch_assoc($resultado2));
                                $row = mysqli_num_rows($resultado2);
                                $rows=0;
                                if ($rows>0) {
                                    mysqli_data_seek($arreglo2,0);
                                    $arreglo2 = mysqli_fetch_assoc($resultado2);
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Seleccione el Cargo</th>
                    <td>
                        <select name="idCargo" id="idCargo">
                            <?php
                                $clas = new Conexion();
                                $conecta = $clas->conectando();
                                $query1 = "SELECT * from cargo where idCargo ='$obj->idCargo'";
                                $res=mysqli_query($conecta,$query1);
                                $a=mysqli_fetch_assoc($res);
                                $identidad1= $a['idCargo'];
                                $nombre1= $a['nombreCargo'];
                                if($identidad1 == $obj->idCargo){
                                    echo "<option value =$identidad1>$nombre1";
                                }
                                ?>
                            <?php
                                do {
                                    $identidad1 = $arreglo4['idCargo'];
                                    $nombre1 = $arreglo4['nombreCargo'];
                                    if ($identidad1 == $obj->idCargo) {
                                        echo "<option value=$identidad1=>$nombre1";
                                    } else {
                                        echo "<option value=$identidad1>$nombre1";
                                    }
                                } while ($arreglo4 = mysqli_fetch_assoc($resultado4));
                                $row = mysqli_num_rows($resultado4);
                                $rows=0;
                                if ($rows>0) {
                                    mysqli_data_seek($arreglo4,0);
                                    $arreglo4 = mysqli_fetch_assoc($resultado4);
                                }
                                ?>
                        </select>
                    </td>
                    <th>Nombre</th>
                    <td><input type="text" name="nombreEmpleado" id="nombreEmpleado"
                            value="<?php echo $obj->nombreEmpleado?>" placeholder="Digite el Nombre del Empleado"
                            size="45"></td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td><input type="text" name="apellidoEmpleado" id="apellidoEmpleado"
                            value="<?php echo $obj->apellidoEmpleado?>" placeholder="Digite el Apellido del Empleado"
                            size="45"></td>
                    <th>Telefono</th>
                    <td><input type="text" name="telefonoEmpleado" id="telefonoEmpleado"
                            value="<?php echo $obj->telefonoEmpleado?>" placeholder="Digite el Telefono del Empleado"
                            size="45"></td>
                </tr>
                <tr>
                    <th>Correo Electronico</th>
                    <td><input type="text" name="emailEmpleado" id="emailEmpleado"
                            value="<?php echo $obj->emailEmpleado?>" placeholder="Digite el Correo del Empleado"
                            size="45"></td>
                    <th>Seleccione la Ubicación</th>
                    <td>
                        <select name="idAsignacionEmpleados" id="idAsignacionEmpleados">
                            <?php
                                $clas = new Conexion();
                                $conecta = $clas->conectando();
                                $query1 = "SELECT * from asignacionempleados where idAsignacionEmpleados='$obj->idAsignacionEmpleados'";
                                $res= mysqli_query($conecta, $query1);
                                $a= mysqli_fetch_assoc($res);
                                $identidad2= $a['idAsignacionEmpleados'];
                                $nombre2=  $a ['Ubicacion'];
                                if($identidad2 == $obj->idAsignacionEmpleados){
                                    echo "<option value=$identidad2>$nombre2";}
                                    ?>
                            <?php
                                do {
                                    $identidad2 = $arreglo5['idAsignacionEmpleados'];
                                    $nombre2 =  $arreglo5['Ubicacion'];
                                    if ($identidad2 == $obj->idAsignacionEmpleados) {
                                        echo "<option value=$identidad2=>$nombre2";
                                    } else {
                                        echo "<option value=$identidad2>$nombre2";
                                    }
                                } while ($arreglo5 = mysqli_fetch_assoc($resultado5));
                                $row = mysqli_num_rows($resultado5);
                                $rows = 0;
                                if ($rows>0) {
                                    mysqli_data_seek($arreglo5,0);
                                    $arreglo5 = mysqli_fetch_assoc($resultado5);
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="4">
                        <center>
                            <button class="btn3" name="modifica" type="submit"onClick="return validarEmpleado(this.form)" >
                                Modificar</button>
                            <a href="empleados.php">
                                <button class="btn2" name="salir" type="button">Salir</button>
                            </a>
                    </td>
    </center>
    </tr>

    </table>
    </form>
    </center>

</body>

</html>