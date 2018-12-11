<?php 
class Prueba
{
	private	$id_pruebas = "";
	private	$tipo_prueba = "";
	private $codigo_notificacion = "";	
	private	$numero_lamina_pdrm = "";
	private	$tipo_busqueda = "";
	private	$especie_plasmodium = "";
	private	$fecha_inicio_fiebre = "";
	private	$fecha_toma_lamina = "";
	private	$lugar_toma_lamina = "";
	private	$parroquia_id = "";
	private $id_paciente = "";
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}