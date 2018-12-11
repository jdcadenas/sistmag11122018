<?php 
class Paciente
{
	private	$id_paciente = "";
	private	$numero_paciente = "";
	private $nombre_paciente = "";	
	private	$apellido_paciente = "";
	private	$cedula_paciente = "";
	private	$nacionalidad_paciente = "";
	private	$fecha_nacimiento = "";
	private	$direccion_paciente = "";
	private	$sexo_paciente = "";
	private $telefono_paciente = "";
	private $etnia_paciente = "";
	
	private $id_parroquia = "";

	private $id_usuario_sistema = "";
	private $email_paciente ="";
	private $estadocivil_paciente ="";
	private $ocupacion ="";
	private $peso_paciente ="";
	private $repre_paciente = "";
	private $fecha_creado = "";
	private $nom_estado = "";
	private $nom_municipio = "";
	private $nom_parroquia = "";
	private $embarazada = "";
	private $madre_lactante = "";
	private $lactante   = "";
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

	
}
