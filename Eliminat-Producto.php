<?php
include('conexion/conexion.php');
 //eliminacion logica de productod
$idProd = $_GET['id'];
$sql = "UPDATE producto SET estatus = '0'
    WHERE clvProd = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:consulta-Productos.php");
}else{
    echo "problemas al Eliminar Producto, consulte al administrador";
}
?>