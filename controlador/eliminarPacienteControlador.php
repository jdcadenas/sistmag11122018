<?php

require_once 'modelo/pacienteModelo.php';


if(isset($_POST["eliminarregistro"]) and $_POST["eliminarregistro"]=="si")
{
	$id_paciente = $_POST["id_paciente"];                

	$pacienteModelo= new PacienteModelo();

	$pacienteModelo-> Eliminar($id_paciente);   
}

require_once("vista/cabecera.php");
require_once 'vista/consultarUsuarios.php';
?>