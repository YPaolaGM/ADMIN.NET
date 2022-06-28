<?php 
    include('../conexion/conexion.php');
    include('../modelos/documentoModelo.php');
?>
<?php
$obj = new Documento();
if($_POST){
    echo "esoty en el post";
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreDocumento = $_POST['nombreDocumento'];
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

    <title>Documentos</title>
</head>

<body>

    <div id="main-container">
        <form action="" name="documentos" id="documentos" method="POST">
            <h1>Crear Documentos</h1>
            <table>
                <tr>
                    <th>Código</th>
                    <td><input type="text" name="codigoDocumento" id="codigoDocumento"
                            placeholder="Codigo Asignado por el Sistema" size="30"></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="nombreDocumento" id="nombreDocumento"
                            placeholder="Digite el nombre del Documento" size="45" required></td>
                </tr>

                <tr>
                    <th colspan="2">
                        <center>
                            <button class="btn1" name="agregar" type="submit" onClick="return validarDocumento(this.form)"> Guardar</button>
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