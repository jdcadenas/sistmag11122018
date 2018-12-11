<?php
require_once 'modelo/municipioModelo.php';

$municipio= new MunicipioModelo();

$estado = $_GET["elegido"];


$datosmunicipios=$municipio-> Listar($estado);

echo $datosmunicipios;

?>