<?php 
    include('../conexion/conexion.php');
    include('../modelos/ubicacionModelo.php');
?>
<?php
$obj = new Ubicacion();
if($_POST){
    
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
    $obj->Ubicacion = $_POST['Ubicacion'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
        $clas = new Conexion();
        $conecta = $clas->conectando();
        $query = "select * from asignacionempleados where idAsignacionEmpleados = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->idAsignacionEmpleados = $arreglo[0];
        $obj->Ubicacion = $arreglo[1];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/formularios.css">
    <script src="../js/validaciones.js"></script>
    <title>Ubicación</title>
</head>
<body>
    <div id="main-container">
    <form action="" method="POST">
        <h1>Modificar Ubicación</h1>
        <table >
            <tr>
                <th>Código</th>
                <td><input type="text" name="idAsignacionEmpleados" id="idAsignacionEmpleados" value="<?php echo $obj->idAsignacionEmpleados ?>" placeholder="Id Asignado por el Sistema" readOnly size="30"></td>
            </tr>
            <tr>
                <th>Ubicación</th>
                <td><input type="text" name="Ubicacion" id="Ubicacion" value="<?php echo $obj->Ubicacion ?>" placeholder="Digite la Ubicación" size="45"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <center>
                        <button class="btn3" name="modifica" type="submit" onClick="return validarUbicacion(this.form)"> Modificar</button>
                        <a href="ubicacion.php">
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