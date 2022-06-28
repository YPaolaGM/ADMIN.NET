<?php 
    include('../conexion/conexion.php');
    include('../modelos/cargoModelo.php');
?>
<?php
$obj = new Cargo();
if($_POST){
    
    $obj->idCargo = $_POST['idCargo'];
    $obj->nombreCargo = $_POST['nombreCargo'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
if(isset($_POST['elimina'])){

        $obj->idCargo = "";
        $obj->nombreCargo = "";

}else{

        $clas = new Conexion();
        $conecta = $clas->conectando();
        $query = "select * from cargo where idCargo = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->idCargo = $arreglo[0];
        $obj->nombreCargo = $arreglo[1];
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
    <title>Cargos</title>
</head>
<body>
    <div id="main-container">
    <form action="" method="POST">
        <h1>Eliminar Cargos</h1>
        <table >
            <tr>
                <th>Id</th>
                <td><input type="text" name="idCargo" id="idCargo" value="<?php echo $obj->idCargo ?>" readOnly placeholder="Codigo Asignado por el Sistema" readOnly size="30"></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombreCargo" id="nombreCargo" value="<?php echo $obj->nombreCargo ?>" readOnly placeholder="Digite el nombre del Cargo" size="45"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <center>
                        <button class="btn4" name="elimina" type="submit" onClick="return validarCargo(this.form)"> Eliminar</button>

                        <a href="cargo.php">
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