<?php
    class Cargo{
                    public $idCargo;
                    public $nombreCargo;

                    function agregarCargo(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from cargo where nombreCargo = '$this->nombreCargo'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Cargo ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into cargo values('$this->idCargo','$this->nombreCargo')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Cargo Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarCargo(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from cargo where nombreCargo = '$this->nombreCargo'";
                        $resultado = mysqli_query($conecta,$consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Cargo ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update cargo set idCargo = '$this->idCargo',
                                nombreCargo = '$this->nombreCargo'
                                where idCargo = '$this->idCargo'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);
                                echo "<script> alert('El Cargo Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarCargo(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $eliminar="delete from cargo where idCargo = '$this->idCargo'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Cargo Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Cargo No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>