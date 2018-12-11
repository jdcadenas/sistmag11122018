<?php
require_once 'modelo/PacienteModelo.php';

$cedula= new PacienteModelo();

$Buscar = $_GET["cedula"];


$datoscedula=$cedula-> Buscar($Buscar);

echo $datoscedula;

?>