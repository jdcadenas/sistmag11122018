<?php
require_once 'modelo/pruebaModelo.php';

$prueba= new PruebaModelo();

$paciente_id = $_GET["pacienteElegido"];


$datos=$prueba->Obtener($paciente_id);

echo  $datos;
?>