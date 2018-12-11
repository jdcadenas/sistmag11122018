<?php
require_once 'modelo/UsuarioSistemaModelo.php';

$cedula= new UsuarioSistemaModelo();

$Buscar = $_GET["cedula"];


$datoscedula=$cedula-> Buscar($Buscar);

echo $datoscedula;

?>