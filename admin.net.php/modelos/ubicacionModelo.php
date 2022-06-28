<?php
include('../controladores/ubicacionControlador.php');

$obj = new Ubicacion();
if($_POST){
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
    $obj->Ubicacion= $_POST['Ubicacion'];
}
if(isset($_POST['agregar'])){

    $obj->agregarUbicacion();

}
if(isset($_POST['modifica'])){

    $obj->modificarUbicacion();

}
if(isset($_POST['elimina'])){

    $obj->eliminarUbicacion();

}
?>
