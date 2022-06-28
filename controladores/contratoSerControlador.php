<?php
    class Contrato{
                    public $codigoContrato;
                    public $numeroContrato;
                    public $documentoCliente;
                    public $idAsignacionEmpleados;
                    
                    function agregarcontratoser(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from contratoservicio where codigoContrato = '$this->codigoContrato'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Contatro ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into contratoservicio values('$this->codigoContrato',
                                                         '$this->numeroContrato',
                                                         '$this->documentoCliente',
                                                         '$this->idAsignacionEmpleados'
                                                                        )";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Servicio Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarcontratoser(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from contratoservicio where codigoContrato = '$this->codigoContrato'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Servicio ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update contratoservicio set codigoContrato = '$this->codigoContrato',
                                                         numeroContrato = '$this->numeroContrato',
                                                         documentoCliente = '$this->documentoCliente',
                                                         idAsignacionEmpleados = '$this->idAsignacionEmpleados'
                                                         where codigoContrato = '$this->codigoContrato'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);
                                echo "<script> alert('El Servicio Fue Modificado en el Sistema')</script>";
                        }

                    }

                    function eliminarcontratoser(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $eliminar="delete from contratoservicio where codigoContrato = '$this->codigoContrato'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Servicio Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Servicio No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
                }
?>