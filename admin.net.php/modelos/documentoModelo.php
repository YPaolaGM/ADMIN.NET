<?php
include('../controladores/documentoControlador.php');

$obj = new Documento();
if($_POST){
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreDocumento = $_POST['nombreDocumento'];
}
if(isset($_POST['agregar'])){

    $obj->agregarDocumento();

}
if(isset($_POST['modifica'])){

    $obj->modificarDocumento();

}
if(isset($_POST['elimina'])){

    $obj->eliminarDocumento();

}
?>