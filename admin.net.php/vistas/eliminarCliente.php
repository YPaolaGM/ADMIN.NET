<?php 
    include('../conexion/conexion.php');
    include('../modelos/clienteModelo.php');
?>
<?php
$obj = new Clientes();
if($_POST){
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->emailCliente = $_POST['emailCliente'];
    $obj->Ubicacion = $_POST['Ubicacion'];
    $obj->contrasena = $_POST['contrasena'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
if(isset($_POST['elimina'])){

    $obj->documentoCliente = "";
    $obj->codigoDocumento = "";
    $obj->nombreCliente = "";
    $obj->apellidoCliente = "";
    $obj->telefonoCliente = "";
    $obj->emailCliente = "";
    $obj->Ubicacion = "";
    $obj->contrasena = "";
}else{

    $clas = new Conexion();
    $conecta = $clas->conectando();
    $query = "select * from clientes where documentoCliente = '$llave'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->documentoCliente = $arreglo[0];
    $obj->codigoDocumento = $arreglo[1];
    $obj->nombreCliente = $arreglo[2];
    $obj->apellidoCliente = $arreglo[3];
    $obj->telefonoCliente = $arreglo[4];
    $obj->emailCliente = $arreglo[5];
    $obj->Ubicacion =$arreglo[6];
    $obj->contrasena = $arreglo[7];

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
    <title>Clientes</title>
</head>
<body>
    <div id="main-container">
    <form action="" method="POST">
        <h1>Eliminar Clientes</h1>
        <table >
            <tr>
            <th>Numero Documento</th>
                <td><input type="text" name="documentoCliente" id="documentoCliente" value="<?php echo $obj->documentoCliente?>" readOnly placeholder="Digite el Documento del Cliente"  size="30"></td>
            
                <th>Seleccione el Documento</th>
                <td><input type="text" name="codigoDocumento" id="codigoDocumento" value="<?php echo $obj->codigoDocumento?>" readOnly  size="45"></td>
            </tr>
            <tr>
            <th>Nombre</th>
                <td><input type="text" name="nombreCliente" id="nombreCliente" value="<?php echo $obj->nombreCliente?>" placeholder="Digite el Nombre del Cliente"  size="45"></td>
            
                <th>Apellido</th>
                <td><input type="text" name="apellidoCliente" id="apellidoCliente" value="<?php echo $obj->apellidoCliente?>" placeholder="Digite el Apellido del Cliente"  size="45"></td>
            </tr>
            <tr>
            <th>Telefono</th>
                <td><input type="text" name="telefonoCliente" id="telefonoCliente" value="<?php echo $obj->telefonoCliente?>" placeholder="Digite el Telefono del Cliente"  size="45"></td>
            
                <th>Correo Electronico</th>
                <td><input type="text" name="emailCliente" id="emailCliente" value="<?php echo $obj->emailCliente?>" placeholder="Digite el Correo del Cliente"  size="45"></td>
            </tr>
            <tr>
                <th>Ubicación</th>
                <td><input type="text" name="Ubicacion" id="Ubicacion" value="<?php echo $obj->Ubicacion?>" placeholder="Digite la ubicación del Cliente"  size="45"></td>
            
                <th>contraseña</th>
                <td><input type="text" name="contrasena" id="contrasena" value="<?php echo $obj->contrasena?>" placeholder="Digite la contrasena del Cliente"  size="45"></td>
            </tr>
            <tr>
                <th colspan="4">
                    <center>
                        <button class="btn4" name="elimina" type="submit" onClick="return validarCliente(this.form)"> Eliminar</button>

                        <a href="cliente.php">
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