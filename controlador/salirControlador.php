<?php 

require_once ('modelo/UsuarioSistemaModelo.php');

$u= new UsuarioSistemaModelo();

$u->salir();

require_once("vista/cabecera.php");
require_once 'vista/loginVista.php';
?>