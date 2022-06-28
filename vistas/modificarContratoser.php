<?php
include('../conexion/conexion.php');
include('../modelos/contratoSerModelo.php');
?>
<?php
$obj = new Contrato();
if ($_POST) {
    $obj->codigoContrato = $_POST['codigoContrato'];
    $obj->numeroContrato = $_POST['numeroContrato'];
    $obj->documentoCliente= $_POST['documentoCliente'];
    $obj->idAsignacionEmpleados  = $_POST['idAsignacionEmpleados'];

}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from contratoservicio where codigoContrato= '$llave'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->codigoContrato = $arreglo[0];
$obj->numeroContrato = $arreglo[1];
$obj->documentoCliente  = $arreglo[2];
$obj->idAsignacionEmpleados  = $arreglo[3];


?>
<?php
//Consulta para el menu desplegable cargo
$clas = new Conexion();
$conecta = $clas->conectando();
$query2 = "select * from clientes";
$resultado2 = mysqli_query($conecta, $query2);
$arreglo2 = mysqli_fetch_assoc($resultado2);

?>
<?php
//Consulta para el menu desplegable ubicacion
$clas = new Conexion();
$conecta = $clas->conectando();
$query3 = "select * from asignacionempleados";
$resultado3 = mysqli_query($conecta, $query3);
$arreglo3 = mysqli_fetch_assoc($resultado3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <script src="../js/validaciones.js"></script>
    <title>Contrato</title>
</head>

<body>
    <div id="main-container">
        <form action="" name="contratoservicio" id="contratoservicio" method="POST">
            <h1>Modificar Contrato</h1>
            <table>
                <tr>
                <th>Codigo</th>
                    <td><input type="text" name="codigoContrato" id="codigoContrato"
                            value="<?php echo $obj->codigoContrato ?>" readOnly
                            placeholder="Codigo Asignado por el Sistema" size="30"></td>

                    <th>Contrato</th>
                    <td><input type="text" name="numeroContrato" id="numeroContrato"
                            value="<?php echo $obj->numeroContrato?>"
                            placeholder="Digite el Numero del Contrato" size="45"></td>
                </tr>
                <tr>
                    <th>Cliente</th>
                    <td>
                            <select name="documentoCliente" id="documentoCliente">
                                <?php
                                $clas = new Conexion();
                                $conecta = $clas->conectando();
                                $query1 = "SELECT * from clientes where documentoCliente ='$obj->documentoCliente'";
                                $res=mysqli_query($conecta,$query1);
                                $a=mysqli_fetch_assoc($res);
                                $identidad= $a['documentoCliente'];
                                $nombre= $a['nombreCliente'];
                                if($identidad == $obj->documentoCliente){
                                    echo "<option value =$identidad>$nombre";
                                }
                                ?>
                                <?php
                                do {
                                    $identidad = $arreglo2['documentoCliente'];
                                    $nombre = $arreglo2['nombreCliente'];
                                    if ($identidad == $obj->documentoCliente) {
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

                    <th>Seleccione la Ubicación</th>
                    <td>
                        <select name="idAsignacionEmpleados" id="idAsignacionEmpleados">
                                <?php
                                $clas = new Conexion();
                                $conecta = $clas->conectando();
                                $query1 = "SELECT * from asignacionempleados where idAsignacionEmpleados='$obj->idAsignacionEmpleados'";
                                $res= mysqli_query($conecta, $query1);
                                $a= mysqli_fetch_assoc($res);
                                $identidad1= $a['idAsignacionEmpleados'];
                                $nombre1=  $a ['Ubicacion'];
                                if($identidad1 == $obj->idAsignacionEmpleados){
                                    echo "<option value=$identidad1>$nombre1";}
                                    ?>
                                <?php
                                do {
                                    $identidad1 = $arreglo3['idAsignacionEmpleados'];
                                    $nombre1 =  $arreglo3['Ubicacion'];
                                    if ($identidad == $obj->idAsignacionEmpleados) {
                                        echo "<option value=$identidad1=>$nombre1";
                                    } else {
                                        echo "<option value=$identidad1>$nombre1";
                                    }
                                } while ($arreglo3 = mysqli_fetch_assoc($resultado3));
                                $row = mysqli_num_rows($resultado3);
                                $rows = 0;
                                if ($rows>0) {
                                    mysqli_data_seek($arreglo3, 0);
                                    $arreglo3 = mysqli_fetch_assoc($resultado3);
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                        <tr>
                    
                    <th colspan="4">
                        <center>
                        <button class="btn3" name="modifica" type="submit" onClick="return validarContrato(this.form)" >
                            Modificar</button>
                        <a href="contratoser.php">
                            <button class="btn2" name="salir" type="button">Salir</button>
                        </a></center>
                    </th>
                </tr>

            </table>
        </form>
    </div>

</body>

</html>