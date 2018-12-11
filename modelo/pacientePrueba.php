<?php 
class PacientePrueba
{
	private	$id_paciente_pruebas = "";
	private	$id_paciente = "";
	private $id_pruebas = "";	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}