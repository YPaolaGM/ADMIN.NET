<?php 
    include('../conexion/conexion.php');
    include('../modelos/documentoModelo.php');
?>
<?php
$obj = new Documento();

if($_POST){
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreDocumento = $_POST['nombreDocumento'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
        $clas = new Conexion();
        $conecta = $clas->conectando();
        $query = "select * from documentos where codigoDocumento = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->codigoDocumento  = $arreglo[0];
        $obj->nombreDocumento = $arreglo[1];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <script src="../js/validaciones.js"></script>

    <title>Documentos</title>
</head>
<body>
    <div id="main-container">
    <form action="" method="POST">
        <h1>Modificar Documentos</h1>
        <table >
            <tr>
                <th>Código</th>
                <td><input type="text" name="codigoDocumento" id="codigoDocumento" value="<?php echo $obj->codigoDocumento  ?>" placeholder="Codigo Asignado por el Sistema" readOnly size="30"></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombreDocumento" id="nombreDocumento" value="<?php echo $obj->nombreDocumento ?>" placeholder="Digite el nombre del Documento" size="45"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <center>
                        <button class="btn3" name="modifica" type="submit" onClick="return validarDocumento(this.form)"> Modificar</button>
                        <a href="documentos.php">
                            <button class="btn2" name="salir" type="button">Salir</button>
                        </a>
                    </center>
                </th>
            </tr>

        </table>
    </form>
    </div>    
    
</body>
</html>