<?php
    class Empleados{
        public $numeroDocumento;
        public $codigoDocumento;
        public $idCargo;
        public $nombreEmpleado;
        public $apellidoEmpleado;
        public $telefonoEmpleado;
        public $emailEmpleado;
        public $idAsignacionEmpleados;

                    function agregarEmpleados(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from empleados where numeroDocumento = '$this->numeroDocumento'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Empleado ya existe en el Sistema')</script>";
                        }else{
                            $insertar = "insert into empleados values('$this->numeroDocumento',                                                                  '$this->codigoDocumento',
                                                       '$this->idCargo',
                                                       '$this->nombreEmpleado',
                                                       '$this->apellidoEmpleado  ',
                                                       '$this->telefonoEmpleado',
                                                       '$this->emailEmpleado',
                                                       '$this->idAsignacionEmpleados')";
                            echo $insertar;
                            mysqli_query($conecta,$insertar);
                            echo "<script> alert('El Empleado Fue registrado en el Sistema')</script>";
                    }

                    }

                    function modificarEmpleados(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select *from empleados where numeroDocumento = '$this->numeroDocumento'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Empleado ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update empleados set numeroDocumento = '$this->numeroDocumento',
                                                        codigoDocumento = '$this->codigoDocumento',
                                                        idCargo = '$this->idCargo',
                                                        nombreEmpleado = '$this->nombreEmpleado',
                                                        apellidoEmpleado = '$this->apellidoEmpleado',
                                                        telefonoEmpleado = '$this->telefonoEmpleado',
                                                        emailEmpleado = '$this->emailEmpleado',
                                                        idAsignacionEmpleados = '$this->idAsignacionEmpleados'
                                                        where numeroDocumento = '$this->numeroDocumento'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);
                                echo "<script> alert('El Empleado Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarEmpleados(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $eliminar="delete from empleados where numeroDocumento = '$this->numeroDocumento'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Empleado Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Empleado No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>