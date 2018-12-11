<?php
require_once 'modelo/tratamientoModelo.php';

$tratamiento= new TratamientoModelo();

$paciente_id = $_GET["pacienteElegido"];


$datos=$tratamiento->Obtener($paciente_id);

echo  $datos;
?>