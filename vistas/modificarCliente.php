<?php
include('../conexion/conexion.php');
include('../modelos/clienteModelo.php');
?>
<?php
$obj = new  Clientes();
if ($_POST) {
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreCliente   = $_POST['nombreCliente'];
    $obj->apellidoCliente   = $_POST['apellidoCliente'];
    $obj->telefonoCliente   = $_POST['telefonoCliente'];
    $obj->emailCliente     = $_POST['emailCliente'];
    $obj->Ubicacion    = $_POST['Ubicacion'];
    $obj->contrasena  = $_POST['contrasena'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$clas = new Conexion();
$conecta = $clas->conectando();
$query = "select * from clientes where documentoCliente= '$llave'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->documentoCliente = $arreglo[0];
$obj->codigoDocumento= $arreglo[1];
$obj->nombreCliente   = $arreglo[2];
$obj->apellidoCliente  = $arreglo[3];
$obj->telefonoCliente  = $arreglo[4];
$obj->emailCliente = $arreglo[5];
$obj->Ubicacion  = $arreglo[6];
$obj->contrasena  = $arreglo[7];

?>
<?php
//Consulta para el menu desplegable Documento
$clas = new Conexion();
$conecta = $clas->conectando();
$query6 = "select * from documentos";
$resultado2 = mysqli_query($conecta, $query6);
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
    <title>Clientes</title>
</head>

<body>
    <div id="main-container">
        <form action="" name="clientes" id="clientes" method="POST">
            <h1>Modificar Clientes</h1>
            <table>
                <tr>
                    <th>Numero Documento</th>
                    <td><input type="text" name="documentoCliente" id="documentoCliente"
                            value="<?php echo $obj->documentoCliente?>" readOnly
                            placeholder="Digite el Documento del Cliente" size="30"></td>

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
                                    if ($identidad== $obj->  codigoDocumento) {
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
                    <th>Nombre</th>
                    <td><input type="text" name="nombreCliente" id="nombreCliente"
                            value="<?php echo $obj->nombreCliente?>" placeholder="Digite el Nombre del Cliente"
                            size="45"></td>
                    </select>
                    </td>
                    <th>Apellido</th>
                    <td><input type="text" name="apellidoCliente" id="apellidoCliente"
                            value="<?php echo $obj->apellidoCliente  ?>" placeholder="Digite el Nombre delCliente"
                            size="45"></td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td><input type="text" name="telefonoCliente" id="telefonoCliente"
                            value="<?php echo $obj->telefonoCliente  ?>" placeholder="Digite el Apellido del Cliente"
                            size="45"></td>
                    <th>Correo Electronico</th>
                    <td><input type="text" name="emailCliente" id="emailCliente"
                            value="<?php echo $obj->emailCliente  ?>" placeholder="Digite el Telefono del Cliente"
                            size="45"></td>
                </tr>
                <tr>
                    <th>ubicación</th>
                    <td><input type="text" name="Ubicacion" id="Ubicacion" value="<?php echo $obj->Ubicacion?>"
                            placeholder="Digite el Correo del Cliente" size="45"></td>

                    <th>contrasena</th>
                    <td><input type="text" name="contrasena" id="contrasena" value="<?php echo $obj->contrasena?>"
                            placeholder="Digite el Correo del Cliente" size="45"></td>
                </tr>
                <tr>
                    <th colspan="4">
                        <center>
                            <button class="btn3" name="modifica" type="submit"
                                onClick="return validarCliente(this.form)">
                                Modificar</button>
                            <a href="cliente.php">
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