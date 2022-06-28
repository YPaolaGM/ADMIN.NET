<?php
include('../conexion/conexion.php');
include('../modelos/contratoSerModelo.php');
?>
<?php
$obj = new Contrato();
if ($_POST) {
    $obj->codigoContrato = $_POST['codigoContrato'];
    $obj->numeroContrato = $_POST['numeroContrato'];
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
    }
?>
<?php
$llave = $_GET['key'];
//echo $llave;
if (isset($_POST['elimina'])) {
    $obj->codigoContrato = "";
    $obj->numeroContrato = "";
    $obj->documentoCliente = "";
    $obj->idAsignacionEmpleados = "";
   } else {

    $clas = new Conexion();
    $conecta = $clas->conectando();
    $query = "select * from contratoservicio where codigoContrato = '$llave'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->codigoContrato = $arreglo[0];
    $obj->numeroContrato = $arreglo[1];
    $obj->documentoCliente = $arreglo[2];
    $obj->idAsignacionEmpleados = $arreglo[3];

}


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
        <form action="" method="POST">
            <h1>Eliminar Contrato</h1>
            <table >
                <tr>
                    <th>Codigo</th>
                    <td><input type="text" name="codigoContrato" id="codigoContrato" value="<?php echo $obj->codigoContrato?>" readOnly placeholder="Digite el Codigo del Contrato" size="30"></td>

                    <th>Contrato</th>
                    <td><input type="text" name="numeroContrato" id="numeroContrato" value="<?php echo $obj->numeroContrato ?>" readOnly size="45"></td>
                </tr>
                <tr>
                    <th>Cliente</th>
                    <td><input type="text" name="documentoCliente" id="documentoCliente" value="<?php echo $obj->documentoCliente   ?>" readOnly placeholder="Digite el Nombre del Empleado" size="45"></td>

                    <th>Seleccione la Ubicación</th>
                    <td><input type="text" name="idAsignacionEmpleados" id="idAsignacionEmpleados" value="<?php echo $obj->idAsignacionEmpleados  ?>" readOnly placeholder="Digite el Apellido del Empleado" size="45"></td>
                </tr>
                <tr>
                <tr>
                   <th colspan="4"><center>
                        <button class="btn4" name="elimina" type="submit"onClick="return validarContrato(this.form)"> Eliminar</button>
                        <a href="contratoser.php">
                            <button class="btn2" name="salir" type="button">Salir</button>
                        </a>
                        </center>
                    </th>
                </tr>

            </table>
        </form>
    </center>

</body>

</html>