<?php
//funciones para destruir una secion ecistente en php
session_start();
session_destroy();
header("location: index.php");
?>