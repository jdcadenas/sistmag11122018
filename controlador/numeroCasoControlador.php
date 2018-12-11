<?php
require_once 'modelo/casoModelo.php';

$numcaso= new CasoModelo();

$paciente_id = $_GET["pacienteElegido"];


$datos=$numcaso->Obtener($paciente_id);

echo  $datos;
?>