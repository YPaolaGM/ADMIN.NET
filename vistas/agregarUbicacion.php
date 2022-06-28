<?php 
    include('../conexion/conexion.php');
    include('../modelos/ubicacionModelo.php');
?>
<?php
$obj = new  Ubicacion();
if($_POST){
    echo "esoty en el post";
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
    $obj->Ubicacion = $_POST['Ubicacion'];
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
    <title>Ubicación</title>
</head>
<body>
    <div id="main-container">
        
    <form action="" name="documentos" id="documentos" method="POST">
        <h1>Crear Ubicación</h1>
        <table>
            <tr>
                <th>Id</th>
                <td><input type="text" name="idAsignacionEmpleados" id="idAsignacionEmpleados" placeholder="Id  Asignado por el Sistema"  size="30"></td>
            </tr>
            <tr>
                <th>Ubicación</th>
                <td><input type="text" name="Ubicacion" id="Ubicacion" placeholder="Digite la Ubicación" size="45" required></td>
            </tr>
            
            <tr>
                <th colspan="2">
                    <center>
                        <button class="btn1" name="agregar" type="submit"  onClick="return validarUbicacion(this.form)"> Guardar</button>
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