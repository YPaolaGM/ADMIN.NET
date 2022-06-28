<?php
    class Servicios{
                    public $codigoServicio;
                    public $codigoContrato;
                    public $aseo;
                    public $seguridad;
                    public $aseoySeguridad;
                    
                    function agregarServicios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from servicios where codigoServicio = '$this->codigoServicio'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Servicio ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into servicios values('$this->codigoServicio',
                                                         '$this->codigoContrato',
                                                         '$this->aseo',
                                                         '$this->seguridad',
                                                         '$this->aseoySeguridad'
                                                                        )";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Servicio Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarServicios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from servicios where codigoServicio = '$this->codigoServicio'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Servicio ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update servicios set codigoServicio = '$this->codigoServicio',
                                                         codigoContrato = '$this->codigoContrato',
                                                         aseo = '$this->aseo',
                                                         seguridad = '$this->seguridad',
                                                         aseoySeguridad = '$this->aseoySeguridad'
                                                         where codigoServicio = '$this->codigoServicio'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);
                                echo "<script> alert('El Servicio Fue Modificado en el Sistema')</script>";
                        }

                    }

                    function eliminarServicios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $eliminar="delete from servicios where codigoServicio = '$this->codigoServicio'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Servicio Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Servicio No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
                }
?>