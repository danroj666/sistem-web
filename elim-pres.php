<?php
include('conexion/conexion.php');
 //eliminacion logica de una presentacion y darlo de baja cambiando su estado a 0 y bo eliminarlo fisicamente
$idProd = $_GET['id'];
$sql = "UPDATE presentacion SET estatus = '0'
    WHERE idPresentacion = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:Presentacion.php");
}else{
    echo "problemas al Eliminar la Categoria, consulte al administrador";
}
?>