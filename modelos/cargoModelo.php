<?php
include('../controladores/cargoControlador.php');

$obj = new Cargo();
if($_POST){
    $obj->idCargo = $_POST['idCargo'];
    $obj->nombreCargo = $_POST['nombreCargo'];
}
if(isset($_POST['agregar'])){

    $obj->agregarCargo();

}
if(isset($_POST['modifica'])){

    $obj->modificarCargo();

}
if(isset($_POST['elimina'])){

    $obj->eliminarCargo();

}
?>