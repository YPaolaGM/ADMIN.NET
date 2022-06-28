<?php
include('../conexion/conexion.php');
include('../modelos/servicioModelo.php');
?>
<?php
$obj = new Servicios();
if ($_POST) {
    $obj->codigoServicio = $_POST['codigoServicio'];
    $obj->codigoContrato = $_POST['codigoContrato'];
    $obj->aseo = $_POST['aseo'];
    $obj->seguridad = $_POST['seguridad'];
    $obj->aseoySeguridad = $_POST['aseoySeguridad'];
    }
?>
<?php
$llave = $_GET['key'];
//echo $llave;
if (isset($_POST['elimina'])) {
    $obj->codigoServicio = "";
    $obj->codigoContrato = "";
    $obj->aseo = "";
    $obj->seguridad = "";
    $obj->aseoySeguridad = "";
   } else {

    $clas = new Conexion();
    $conecta = $clas->conectando();
    $query = "select * from servicios where codigoServicio = '$llave'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->codigoServicio = $arreglo[0];
    $obj->codigoContrato = $arreglo[1];
    $obj->aseo = $arreglo[2];
    $obj->seguridad = $arreglo[3];
    $obj->aseoySeguridad  = $arreglo[4];

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <title>Contrato</title>
</head>

<body>
    <div id="main-container">
        <form action="" method="POST">
            <h1>Eliminar Contrato</h1>
            <table >
                <tr>
                    <th>Codigo</th>
                    <td><input type="text" name="codigoServicio" id="codigoServicio"
                            value="<?php echo $obj->codigoServicio?>" readOnly
                            placeholder="Digite el Codigo del Contrato" size="30"></td>
                </tr>
                <tr>
                    <th>Contrato</th>
                    <td><input type="text" name="codigoContrato" id="codigoContrato"
                            value="<?php echo $obj->codigoContrato ?>" readOnly size="45"></td>
                </tr>
                <tr>
                    <th>Aseo</th>
                    <td><input type="text" name="aseo" id="aseo" value="<?php echo $obj->aseo   ?>" readOnly
                            placeholder="Digite el Nombre del Empleado" size="45"></td>
                </tr>
                <tr>
                    <th>Seguridad</th>
                    <td><input type="text" name="seguridad" id="seguridad" value="<?php echo $obj->seguridad  ?>"
                            readOnly placeholder="Digite el Apellido del Empleado" size="45"></td>
                </tr>
                <tr>
                <th>Aseo y seguridad</th>
                    <td><input type="text" name="aseoySeguridad" id="aseoySeguridad" value="<?php echo $obj->aseoySeguridad  ?>"
                            readOnly placeholder="Digite el Apellido del Empleado" size="45"></td>
                </tr>
                <tr>
                    <th colspan="4">
                        <center>
                            <button  class="btn4" name="elimina" type="submit" onClick="return validarempleados(this.form)">
                                Eliminar</button>
                            <a href="servicios.php">
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