<?php
//conexion a BD
include('conexion/conexion.php');
 //eliminacion logica de usuario en su estatus final
$idProd = $_GET['id'];
$sql = "UPDATE usuario SET estatus = '0'
    WHERE idUsuario = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:consultar-Usuario.php");
}else{
    echo "problemas al Eliminar Producto, consulte al administrador";
}