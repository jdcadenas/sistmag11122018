<?php
require_once 'modelo/UsuarioSistemaModelo.php';
$usuario=new UsuarioSistemaModelo();

$datos=$usuario->Listar();


if(isset($_POST["eliminarregistro"]) and $_POST["eliminarregistro"]=="si")
{
	$id_usuario_sistema = $_POST["id_usuario_sistema"];
	

	$UsuarioSistemaModelo= new UsuarioSistemaModelo();


	$UsuarioSistemaModelo-> Eliminar($id_usuario_sistema);
	
}
require_once "vista/cabecera.php";
require_once 'vista/consultarUsuarios.php';
?>