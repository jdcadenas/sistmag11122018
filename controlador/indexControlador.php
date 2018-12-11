<?php
if (isset($_SESSION["usulog"])) {
	header("Location: " . RUTA . "/?accion=principal");
	exit();
}

if (isset($_POST["logear"]) and $_POST["logear"]=="si"){
	$usuario=$_POST["login"];
	include("modelo/UsuarioSistemaModelo.php");

	$usuarioObj = new UsuarioSistemaModelo();
	$clave=$_POST["clave"];
	$usuarioObj->logueo($usuario,$clave);
	$_SESSION["tipo"]='administrador';
	$_SESSION["usulog"]="si";
	header("Location: " . RUTA . "/?accion=principal");
	exit();
}

require_once("vista/cabecera.php");
require_once 'vista/loginVista.php';
?>