<?php
    class Ubicacion{
                    public $idAsignacionEmpleados;
                    public $Ubicacion;

                    function agregarUbicacion(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from asignacionempleados where Ubicacion = '$this->Ubicacion'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('La ubicación ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into asignacionempleados values('$this->idAsignacionEmpleados','$this->Ubicacion  ')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('La Ubicacion Fue registrado en el Sistema')</script>";
                        }
                    }
                    function modificarUbicacion(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from asignacionempleados where Ubicacion   = '$this->Ubicacion  '";
                        $resultado = mysqli_query($conecta,$consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('La Ubicacion ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update asignacionempleados set idAsignacionEmpleados = '$this->idAsignacionEmpleados',
                                Ubicacion  = '$this->Ubicacion  '
                                where idAsignacionEmpleados = '$this->idAsignacionEmpleados'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);
                                echo "<script> alert('La Ubicacion Fue Modificado en el Sistema')</script>";
                        }
                    }

                    function eliminarUbicacion(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $eliminar="delete from asignacionempleados where idAsignacionEmpleados = '$this->idAsignacionEmpleados'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('La Ubicacion Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('La Ubicacion No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>