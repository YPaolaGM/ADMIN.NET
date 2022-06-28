<?php
    include('../conexion/conexion.php');
    include('../modelos/cargoModelo.php');
?>
<?php
$obj = new Cargo();
if($_POST){
    //echo "esoty en el post";
    $obj->idCargo = $_POST['idCargo'];
    $obj->nombreCargo = $_POST['nombreCargo'];
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
        <form action="" name="cargo" id="cargo" method="POST" class="form">
            <h1> Crear Cargo</h1>
            <table>
                <tr>
                    <th>Id</th>
                    <td><input type="text" name="idCargo" id="idCargo" placeholder="Id Asignado por el Sistema"
                            size="30"></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="nombreCargo" id="nombreCargo" placeholder="Digite el nombre del Cargo"
                            size="45"></td>
                </tr>
                <tr>
                    <th colspan="2">
                        <br>
                        <center>
                            <button class="btn1" name="agregar" type="submit" onClick="return validarCargo(this.form)">
                                Guardar</button>
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