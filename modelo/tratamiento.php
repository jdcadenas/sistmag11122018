<?php 
class Tratamiento
{
	private	$id_tratamiento = "";
	private	$nombre = "";
	private $cantidad = "";	
	private	$fecha_suministrado = "";
	private $id_paciente = "";

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}