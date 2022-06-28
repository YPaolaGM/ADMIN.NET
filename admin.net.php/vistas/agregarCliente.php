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
//Consulta para el menu desplegable
        $clas = new Conexion();
        $conecta = $clas->conectando();
        $query = "select * from documentos";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_assoc($resultado);


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
        <h1>Crear Cliente</h1>
        <table>
            <tr>
                <th>Numero Documento</th>
                <td><input type="text" name="documentoCliente" id="documentoCliente" placeholder="Digite el Documento del Cliente"  size="30"></td>
            
                <th>Seleccione el Documento</th>
                <td>
                    <select name="codigoDocumento" id="codigoDocumento">
                        <option>Seleccione el Documento</option>
                        <option>
                                <?php
                                    do{
                                       $identidad = $arreglo['codigoDocumento'];
                                       $nombre =  $arreglo['nombreDocumento']; 
                                       if($identidad == $obj->codigoDocumento){
                                           echo "<option value=$identidad=>$nombre";
                                       }else{
                                            echo "<option value=$identidad>$nombre";
                                           }
                                    }while($arreglo = mysqli_fetch_assoc($resultado));
                                    $row = mysqli_num_rows($resultado);
                                    $rows=0;
                                    if($rows>0){
                                                mysqli_data_seek($arreglo,0);
                                                $arreglo = mysqli_fetch_assoc($resultado);
                                    }
                                ?> 
                        </option>
                    </select>
                
                </td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombreCliente" id="nombreCliente" placeholder="Digite el Nombre del Cliente"  size="45"></td>
            
                <th>Apellido</th>
                <td><input type="text" name="apellidoCliente" id="apellidoCliente" placeholder="Digite el Apellido del Cliente"  size="45"></td>
            </tr>
            <tr>
                <th>Telefono</th>
                <td><input type="text" name="telefonoCliente" id="telefonoCliente" placeholder="Digite el Telefono del Cliente"  size="45"></td>
            
                <th>Correo Electronico</th>
                <td><input type="text" name="emailCliente" id="emailCliente" placeholder="Digite el Correo del Cliente"  size="45"></td>
            </tr>
            <tr>
                <th>Ubicación</th>
                <td><input type="text" name="Ubicacion" id="Ubicacion" placeholder="Digite la Ubicación del Cliente"  size="45"></td>
            
                <th>contrasena</th>
                <td><input type="text" name="contrasena" id="contrasena" placeholder="Digite la contrasena del Cliente"  size="45"></td>
            </tr>
            <tr>
                <th colspan="4">
                    <center>
                        <button  class="btn1" name="agregar" type="submit"onClick="return validarCliente(this.form)"> Guardar</button>
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