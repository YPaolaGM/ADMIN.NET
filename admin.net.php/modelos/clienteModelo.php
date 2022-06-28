<?php
include('../controladores/clienteControlador.php');

$obj = new Clientes();
if($_POST){
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->emailCliente = $_POST['emailCliente'];
    $obj->Ubicacion = $_POST['Ubicacion'];
    $obj->contrasena = $_POST['contrasena'];
}
if(isset($_POST['agregar'])){

    $obj->agregarCliente();

}
if(isset($_POST['modifica'])){

    $obj->modificarCliente();
   

}
if(isset($_POST['elimina'])){

    $obj->eliminarCliente();

}
?>