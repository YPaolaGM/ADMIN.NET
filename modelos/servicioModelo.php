<?php
include('../controladores/serviciodControlador.php');

$obj = new Servicios();
if($_POST){
    $obj->codigoServicio = $_POST['codigoServicio'];
    $obj->codigoContrato  = $_POST['codigoContrato'];
    $obj->aseo = $_POST['aseo'];
    $obj->seguridad = $_POST['seguridad'];
    $obj->aseoySeguridad = $_POST['aseoySeguridad'];


}
if(isset($_POST['agregar'])){

    $obj->agregarServicios();

}
if(isset($_POST['modifica'])){

    $obj->modificarServicios();

}
if(isset($_POST['elimina'])){

    $obj->eliminarServicios();

}