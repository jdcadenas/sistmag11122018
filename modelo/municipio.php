<?php 
class Municipio
{
    private	$id_municipio = "";
	private $nombre = "";	
	private	$estado_id = "";
	
	

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}