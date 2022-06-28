<?php
    class Documento{
                    public $codigoDocumento;
                    public $nombreDocumento;

                    function agregarDocumento(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from documentos where nombreDocumento = '$this->nombreDocumento'";
                        $resultado = mysqli_query($conecta,$consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Documento ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into documentos values('$this->codigoDocumento','$this->nombreDocumento')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Documento Fue registrado en el Sistema')</script>";
                        }


                    }
                    function modificarDocumento(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $consulta = "select * from documentos where nombreDocumento = '$this->nombreDocumento'";
                        $resultado = mysqli_query($conecta,$consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Documento ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update documentos set codigoDocumento = '$this->codigoDocumento',
                                nombreDocumento  = '$this->nombreDocumento'
                                where codigoDocumento = '$this->codigoDocumento'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);
                                echo "<script> alert('El Documento Fue Modificado en el Sistema')</script>";
                        }
                    }

                    function eliminarDocumento(){
                        $clas = new Conexion();
                        $conecta = $clas->conectando();
                        $eliminar="delete from documentos where codigoDocumento = '$this->codigoDocumento'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Documento Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Documento No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
}
?>