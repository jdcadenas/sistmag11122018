<?php
require_once 'modelo/UsuarioSistemaModelo.php';

$usuario_sistema= new UsuarioSistemaModelo();

$Buscar = $_GET["usuario_sistema"];


$datosnombreusu=$usuario_sistema-> BuscarNombreUsu($Buscar);

echo $datosnombreusu;

?>