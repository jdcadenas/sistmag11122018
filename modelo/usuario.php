<?php 
class Usuario
{
	private	$id_usuario_sistema = "";
	private	$usuario_sistema = "";
	private $clave = "";	
	private	$nombre = "";
	private	$apellido = "";
	private	$cedula = "";
	private	$id_rol = "";	
	private	$telefono_usuario = "";
	private $email_usuario    = "";
	private $fecha_creado     = "";	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}