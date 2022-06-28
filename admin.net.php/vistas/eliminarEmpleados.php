<?php 
    include('../conexion/conexion.php');
    include('../modelos/empleadosModelo.php');
?>
<?php
$obj = new Empleados();
if($_POST){
    $obj->numeroDocumento = $_POST['numeroDocumento'];
    $obj->codigoDocumento= $_POST['codigoDocumento'];
    $obj->idCargo = $_POST['idCargo'];
    $obj->nombreEmpleado = $_POST['nombreEmpleado'];
    $obj->apellidoEmpleado  = $_POST['apellidoEmpleado'];
    $obj->telefonoEmpleado = $_POST['telefonoEmpleado'];
    $obj->emailEmpleado  = $_POST['emailEmpleado'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
if(isset($_POST['elimina'])){

    $obj->numeroDocumento = "";
    $obj->codigoDocumento= "";
    $obj->idCargo = "";
    $obj->nombreEmpleado = "";
    $obj->apellidoEmpleado  = "";
    $obj->telefonoEmpleado = "";
    $obj->emailEmpleado  = "";
    $obj->idAsignacionEmpleados = "";
}else{

    $clas = new Conexion();
    $conecta = $clas->conectando();
    $query = "select * from empleados where numeroDocumento = '$llave'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->numeroDocumento = $arreglo[0];
    $obj->codigoDocumento= $arreglo[1];
    $obj->idCargo = $arreglo[2];
    $obj->nombreEmpleado = $arreglo[3];
    $obj->apellidoEmpleado  = $arreglo[4];
    $obj->telefonoEmpleado = $arreglo[5];
    $obj->emailEmpleado  =$arreglo[6];
    $obj->idAsignacionEmpleados = $arreglo[7];

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
    <title>Empleados</title>
</head>
<body>
    <div id="main-container">
    <form action="" method="POST">
        <h1>Eliminar Empleados</h1>
        <table >
            <tr>
            <th>Numero Documento</th>
                <td><input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo $obj->numeroDocumento?>" readOnly placeholder="Digite el Documento del Empleado"  size="30"></td>
            
                <th>Seleccione el Documento</th>
                <td><input type="text" name="codigoDocumento" id="codigoDocumento" value="<?php echo $obj->codigoDocumento?>" readOnly  size="45"></td>
            </tr>
            <tr>
            <th>Nombre</th>
                <td><input type="text" name="idCargo" id="idCargo" value="<?php echo $obj->idCargo?>" placeholder="Digite el Nombre del Empleado"  size="45"></td>
            
                <th>Apellido</th>
                <td><input type="text" name="nombreEmpleado" id="nombreEmpleado" value="<?php echo $obj->nombreEmpleado?>" placeholder="Digite el Apellido del Empleado"  size="45"></td>
            </tr>
            <tr>
            <th>Telefono</th>
                <td><input type="text" name="apellidoEmpleado" id="apellidoEmpleado" value="<?php echo $obj->apellidoEmpleado ?>" placeholder="Digite el Telefono del Empleado"  size="45"></td>
            
                <th>Correo Electronico</th>
                <td><input type="text" name="telefonoEmpleado" id="telefonoEmpleado" value="<?php echo $obj->telefonoEmpleado?>" placeholder="Digite el Correo del Empleado"  size="45"></td>
            </tr>
            <tr>
                <th>Ubicación</th>
                <td><input type="text" name="emailEmpleado" id="emailEmpleado" value="<?php echo $obj->emailEmpleado ?>" placeholder="Digite la ubicación del Empleado"  size="45"></td>
            
                <th>idAsignacionEmpleados</th>
                <td><input type="text" name="idAsignacionEmpleados" id="idAsignacionEmpleados" value="<?php echo $obj->idAsignacionEmpleados?>" placeholder="Digite la idAsignacionEmpleados del Empleado"  size="45"></td>
            </tr>
            <tr>
                <th colspan="4">
                    <center>
                        <button class="btn4" name="elimina" type="submit" onClick="return validarEmpleado(this.form)"> Eliminar</button>

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