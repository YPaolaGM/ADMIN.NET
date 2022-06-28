<?php
include('../conexion/conexion.php');
include('../modelos/servicioModelo.php');
?>
<?php
$obj = new Servicios();
if ($_POST) {
    $obj->codigoServicio  = $_POST['codigoServicio'];
    $obj->codigoContrato  = $_POST['codigoContrato'];
    $obj->aseo= $_POST['aseo'];
    $obj->seguridad = $_POST['seguridad'];
    $obj->aseoySeguridad = $_POST['aseoySeguridad'];

}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from servicios where codigoServicio = '$llave'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->codigoServicio  = $arreglo[0];
$obj->codigoContrato  = $arreglo[1];
$obj->aseo  = $arreglo[2];
$obj->seguridad = $arreglo[3];
$obj->aseoySeguridad = $arreglo[4];

?>
<?php
//Consulta para el menu desplegable
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from contratoservicio";
$resultado2 = mysqli_query($conecta, $query);
$arreglo2 = mysqli_fetch_assoc($resultado2  );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <title>Servicio</title>
</head>

<body>
    <div id="main-container">
        <form action="" name="contratoservicio" id="contratoservicio" method="POST">
            <h1>Modificar Servicio</h1>
            <table >
                <tr>
                <th>Codigo</th>
                    <td><input type="text" name="codigoServicio" id="codigoServicio"
                            value="<?php echo $obj->codigoServicio?>" readOnly
                            placeholder="Codigo Asignado por el Sistema" size="30"></td>
                            </tr>
                        <tr>
                            <th>Contrato</th>
                    <td>
                    <select name="codigoContrato" id="codigoContrato">
                                <?php
                                $clas = new Conexion();
                                $conecta = $clas->conectando();
                                $query1 = "SELECT * from contratoservicio where codigoContrato ='$obj->codigoContrato'";
                                $res=mysqli_query($conecta,$query1);
                                $a=mysqli_fetch_assoc($res);
                                $identidad= $a['codigoContrato'];
                                $nombre= $a['numeroContrato'];
                                if($identidad == $obj->codigoContrato){
                                    echo "<option value =$identidad>$nombre";
                                }
                                ?>
                                <?php
                                do {
                                    $identidad = $arreglo2['codigoContrato'];
                                    $nombre = $arreglo2['numeroContrato'];
                                    if ($identidad == $obj->codigoContrato) {
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
                <th>Aseo</th>
                    <td><input type="text" name="aseo" id="aseo"
                            value="<?php echo $obj->aseo?>" 
                            placeholder="Solicitado" size="2"></td>
                    </tr>
                    <tr>
                <th>Seguridad</th>
                <td><input type="text" name="seguridad" id="seguridad" value="<?php echo $obj->seguridad?>" placeholder="Solicitado" size="2"></td>
            </tr>
            <tr>
                <th>Aseo y seguridad</th>
                <td><input type="text" name="aseoySeguridad" id="aseoySeguridad" value="<?php echo $obj->aseoySeguridad?>" placeholder="Solicitado" size="2"></td>
                   </tr>
                        <tr>
                    
                    <th colspan="4">
                        <center>
                        <button class="btn3" name="modifica" type="submit" >
                            Modificar</button>
                        <a href="servicios.php">
                            <button class="btn2" name="salir" type="button">Salir</button>
                        </a></center>
                    </th>
                </tr>

            </table>
        </form>
    </div>

</body>

</html>