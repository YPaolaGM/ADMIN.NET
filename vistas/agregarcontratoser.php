<?php 
    include('../conexion/conexion.php');
    include('../modelos/contratoSerModelo.php');
?>
<?php
$obj = new Contrato();
if($_POST){
    $obj->codigoContrato = $_POST['codigoContrato'];
    $obj->numeroContrato = $_POST['numeroContrato'];
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
    
}
?>
<?php
//Consulta para el menu desplegable
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from clientes";
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
    <title>Contratos</title>
</head>
<body>
    <div id="main-container">
    <form action="" name="contratoservicio" id="contratoservicio" method="POST">
        <h1>Crear Contrato</h1>
        <table >
            <tr>
                <th>Contrato</th>
                <td><input type="text" name="codigoContrato" id="codigoContrato" placeholder="Codigo Asigando por el Sistema"  size="30"></td>
            </tr>
            <tr>    
                <th>numero de Contrato</th>
                <td><input type="text" name="numeroContrato" id="numeroContrato" placeholder="Solicitado"  size="45"></td>
            </tr>
            <tr>
                <th>Seleccione el Cliente</th>
                <td><select name="documentoCliente" id="documentoCliente" >
                    <option>Seleccione el Cliente</option>
                            <option>
                                <?php
                                do {
                                    $identidad = $arreglo['documentoCliente'];
                                    $nombre = $arreglo['nombreCliente'];
                                    if ($identidad == $obj->documentoCliente) {
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
                        </select></td>
                
            </tr>
            <tr>
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
                        </select>           </tr>
            <tr>
                <th colspan="4">
                    <center>
                        <button class="btn1"name="agregar" type="submit" onClick="return validarContrato(this.form)"> Guardar</button>
                        <a href="contratoser.php">
                            <button class="btn2"name="salir" type="button">Salir</button>
                        </a>
                    </center>
                </th>
            </tr>
        </table>
    </form>
    </center>    
</body>
</html>   