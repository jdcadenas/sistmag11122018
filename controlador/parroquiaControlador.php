<?php
require_once 'modelo/parroquiaModelo.php';

$parroquias= new ParroquiaModelo();

$parroquia_id = $_GET["elegido"];


$datosparroquias=$parroquias->Listar($parroquia_id);

echo  $datosparroquias;
?>