<?php
include('../conexion/conexion.php');
?>
<?php
if($_POST){
   $obj->Ubicacion  = $_POST['Ubicacion'];  
   //echo $obj->Ubicacion ;
}
?>
<?php
$correrPagina = $_SERVER["PHP_SELF"]; /* es una variable súper global que retorna el nombre del archivo que actualmente está ejecutando el script. Así que, $_SERVER[“PHP_SELF”] envía los datos del formulario a la misma página, en vez de saltar a una página distinta*/
$maximoDatos = 5;
$paginaNumero = 0;

if(isset($_GET['paginaNumero'])){
   $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;

?>
<?php
if(isset($_POST['consulta'])){
   // echo "<script>alert('llegue')</script>";
        $clas = new Conexion();
        $conecta = $clas->conectando();
        $query = "select * from asignacionempleados where Ubicacion  like
        '%$obj->Ubicacion %' ";
        $limite =sprintf("%s limit %d, %d",$query, $inicia, $maximoDatos);
        $resultado = mysqli_query($conecta,$limite);
        $arreglo = mysqli_fetch_row($resultado);
        
}else{
        $clas = new Conexion();
        $conecta = $clas->conectando();
        $query = "select * from asignacionempleados";
        $limite =sprintf("%s limit %d, %d",$query, $inicia, $maximoDatos);
        $resultado = mysqli_query($conecta,$limite);
        $arreglo = mysqli_fetch_row($resultado);
}
?>
<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
	
}
	else{
		$lista = mysqli_query($conecta,$query);
		$totalArreglo = mysqli_num_rows($lista);
	}
$totalPagina = ceil($totalArreglo/$maximoDatos)-1;

?>
<?php
$cargarPagina = "";
if(!empty($_SERVER['QUERY_STRING'])){ /* Consulta una cadena de la base de datos empty(vacio) */
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); /* Divide la consulta para meterla en un arreglo */
	$nuevoParametro = array();
	foreach($parametro1 as $parametro2){
			if(stristr($parametro2, "paginaNumero")==false && stristr($parametro2, "totalArreglo")==false){ //Compara una cadena dentro de otra cadena
				 array_push($nuevoParametro, $parametro2);
			}
	}
	if(count($nuevoParametro)!=0){
		$cargarPagina = "&". htmlentities(implode("&", $nuevoParametro));
	}
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/tablaprincipal.css">
    <title>Ubicación</title>
</head>

<body>
    <div id="main-container">
        <center>
            <h1>Ubicación</h1>
            <form action="" name="ubicacion" method="POST">
                <table width="500">
                    <tr>
                        <td>
                            <a href="agregarUbicacion.php">
                                <button class="btn1" type="button" name="agregar" value="Agregar">Agregar</button>
                            </a>
                        </td>
                        <td>
                            <h3>Buscar</h3>
                        </td>
                        <td>
                            <input class="place"type="text" name="Ubicacion " id="Ubicacion " placeholder="Digite La Ubicación"
                                size="50">
                        </td>
                        <td>
                            <button class="btn1" type="submit" name="consulta" value="consulta">Buscar</button>
                        </td>
                        <td>
                            <button class="btn2" type="submit" name="refrescar" value="refrescar">Listar</button>
                        </td>
                        <td>
                            <button class="btn3" type="button" name="salir" value="salir">Salir</button>
                        </td>
                    </tr>

                </table>
                <br>
                <hr>
                <br>
                <table class="listar" border="1" width="1000">
                    <thead>
                        <tr>
                            <td>
                                <center>Id</center>
                            </td>
                            <td>
                                <center>Ubicacion</center>
                            </td>
                            <td>
                                <center>Modificar</center>
                            </td>
                            <td>
                                <center>Eliminar</center>
                            </td>
                        </tr>
                    </thead>
                    <?php
                    if($arreglo>0){
                    
                        do{
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $arreglo[0]; ?></td>
                            <td><?php echo $arreglo[1]; ?></td>
                            <td>
                                <a href="<?php if($arreglo[0]<>""){
                                    echo "modificarUbicacion.php?key=".urlencode($arreglo[0]);
                                }?>">
                                    <button class="btn4" type="button" name="modificar" value="modificar">Modificar
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?php if($arreglo[0]<>""){
                                    echo "eliminarUbicacion.php?key=".urlencode($arreglo[0]);
                                }?>">
                                    <button class="btn5" type="button" name="eliminar" value="eliminar">Eliminar
                                    </button>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                    <?php                
                    }while($arreglo = mysqli_fetch_row($resultado));
                }else{
                    echo "No existen Registros";
                }
                ?>
                </table>
                <br>
                <hr>
                <h5><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></h5>
                <table border=1>
                    <tr>
                        <td class="pag">
                            <?php  
                        if($paginaNumero > 0){
                    ?>
                            <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina,0,$cargarPagina) ?>"
                                id="paginador">
                                < Inicio </a> <?php }?>
                        </td>
                        <td class="pag">
                            <?php  
                    if($paginaNumero > 0){
                ?>
                            <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, max(0,$paginaNumero-1),$cargarPagina) ?>"
                                id="paginador">
                                << Anterior </a> <?php }?>
                        </td>
                        <td class="pag">
                            <?php 
                    if($paginaNumero < $totalPagina ){
                    ?>
                            <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, min($totalPagina,$paginaNumero+1),$cargarPagina) ?>"
                                id="paginador"> Siguiente >> </a> <?php }?>
                        </td >
                        <td class="pag">
                            <?php 
                    if($paginaNumero < $totalPagina ){
                ?>
                            <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, $totalPagina,$cargarPagina) ?>"
                                id="paginador"> Ultima ></a> <?php } ?>
                        </td>
                    </tr>
                </table>

            </form>
        </center>

    </div>
</body>

</html>