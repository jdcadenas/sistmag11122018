<?php

require_once 'modelo/UsuarioSistemaModelo.php';


if(isset($_POST["eliminarregistro"]) and $_POST["eliminarregistro"]=="si")
{
	$id_usuario_sistema = $_POST["id_usuario_sistema"];                

	$UsuarioSistemaModelo= new UsuarioSistemaModelo();

	$UsuarioSistemaModelo-> Eliminar($id_usuario_sistema);
	
}



?>