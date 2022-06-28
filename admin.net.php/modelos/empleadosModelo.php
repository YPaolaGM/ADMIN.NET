<?php
include('../controladores/empleadosControlador.php');

$obj = new Empleados();
if($_POST){
    $obj->numeroDocumento = $_POST['numeroDocumento'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->idCargo = $_POST['idCargo'];
    $obj->nombreEmpleado = $_POST['nombreEmpleado'];
    $obj->apellidoEmpleado = $_POST['apellidoEmpleado'];
    $obj->telefonoEmpleado = $_POST['telefonoEmpleado'];
    $obj->emailEmpleado = $_POST['emailEmpleado'];
    $obj->idAsignacionEmpleados = $_POST['idAsignacionEmpleados'];
}
if(isset($_POST['agregar'])){

    $obj->agregarEmpleados();

}
if(isset($_POST['modifica'])){

    $obj->modificarEmpleados();

}
if(isset($_POST['elimina'])){

    $obj->eliminarEmpleados();

}
?>
