<?php 
class Parroquia
{
	private	$id_parroquia = "";
	private $nombre = "";	
	private	$municipio_id = "";
	
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}