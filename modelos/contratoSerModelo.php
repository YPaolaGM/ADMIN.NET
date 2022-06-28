<?php
include('../controladores/contratoSerControlador.php');

$obj = new Contrato();
if($_POST){
    $obj->codigoContrato = $_POST['codigoContrato'];
    $obj->numeroContrato  = $_POST['numeroContrato'];
    $obj->documentoCliente  = $_POST['documentoCliente'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
   

}
if(isset($_POST['agregar'])){

    $obj->agregarcontratoser();

}
if(isset($_POST['modifica'])){

    $obj->modificarcontratoser();

}
if(isset($_POST['elimina'])){

    $obj->eliminarcontratoser();

}