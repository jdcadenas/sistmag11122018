<?php 
class Reporte
{
	private  $fecha_reporte ="";
	private  $fecha_busqueda="";
	private $nombre = "";	

	
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}