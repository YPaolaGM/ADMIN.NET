<?php 
    include('../conexion/conexion.php');
    include('../modelos/servicioModelo.php');
?>
<?php
$obj = new Servicios();
if($_POST){
    $obj->codigoServicio = $_POST['codigoServicio'];
    $obj->codigoContrato = $_POST['codigoContrato'];
    $obj->aseo = $_POST['aseo'];
    $obj->seguridad = $_POST['seguridad'];
    $obj->aseoySeguridad = $_POST['aseoySeguridad'];
    
}
?>
<?php
//Consulta para el menu desplegable
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from contratoservicio";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_assoc($resultado);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <title>Servicios</title>
</head>

<body>
    <div id="main-container">
        <form action="" name="servicios" id="servicios" method="POST">
            <h1>Crear Servicio</h1>
            <table>
                <tr>
                    <th>Codigo</th>
                    <td><input type="text" name="codigoServicio" id="codigoServicio"
                            placeholder="Codigo Asigando por el Sistema" size="30"></td>
                </tr>
                <tr>
                    <th>Seleccione el Contrato</th>
                    <td><select name="codigoContrato" id="codigoContrato">
                            <option>Seleccione el Contrato</option>
                            <option>
                                <?php
                                do {
                                    $identidad = $arreglo['codigoContrato'];
                                    $nombre = $arreglo['numeroContrato'];
                                    if ($identidad == $obj->codigoContrato) {
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
                <tr>
                    <th>Aseo</th>
                    <td><input type="text" name="aseo" id="aseo" placeholder="Solicitado" size="45"></td>
                </tr>
                <tr>
                    <th>Seguridad</th>
                    <td><input type="text" name="seguridad" id="seguridad" placeholder="Solicitado" size="45"></td>
                <tr>
                    <th>Aseo y Seguridad</th>
                    <td><input type="text" name="aseoySeguridad" id="aseoySeguridad" placeholder="Solicitado" size="45">
                    </td>
                </tr>
                <tr>
                    <th colspan="4">
                        <center>
                            <button  class="btn1" name="agregar" type="submit"> Guardar</button>
                            <a href="servicios.php">
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