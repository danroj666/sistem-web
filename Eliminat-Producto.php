<?php
include('conexion/conexion.php');
 
$idProd = $_GET['id'];
$sql = "UPDATE producto SET estatus = '0'
    WHERE clvProd = '$idProd'";


?>