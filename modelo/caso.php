<?php 
class Caso
{
	private	$id_caso = "";
	private $numero_caso = "";	
	private	$muerte = "";
	private	$recaida = "";	
	private	$clasificacion_caso = "";
	private $direccion  ="";
	private $estado   = "";
	private $municipio   = "";
	private $parroquia   =  "";
	
	
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
} 