<?php

require_once 'modelo/pacienteModelo.php';
require_once 'modelo/parroquiaModelo.php';
require_once 'modelo/municipioModelo.php';
require_once 'modelo/estadoModelo.php';

$parroquias = new ParroquiaModelo();
$municipios = new MunicipioModelo();
$estados    = new EstadoModelo();

//$datosp     = $parroquias->ListarTodas();

//$datosm     = $municipios->ListarTodas();

//$datose     = $estados->ListarTodas();

if (isset($_GET["editarregistro"]) and $_GET["editarregistro"] == "si") {
    $id_paciente = $_GET["id_paciente"];
    
    $pacienteModelo = new PacienteModelo();

    $pac = $pacienteModelo->Obtener($id_paciente);

    $muni = $parroquias->ObtenerMuni($pac->id_parroquia);

}

require_once "vista/cabecera.php";
require_once 'vista/editarPaciente.php';

if (isset($_POST["editarregistro"]) and $_POST["editarregistro"] == "si") {

    $nombre_paciente       = $_POST["nombre"];
    $apellido_paciente     = $_POST["apellido"];
    $cedula_paciente       = $_POST["cedula"];
    $nacionalidad_paciente = $_POST["nacionalidad_paciente"];
    $fecha_nacimiento      = $_POST["fecha_nacimiento"];
    $direccion_paciente    = $_POST["direccion_paciente"];
    $sexo_paciente         = $_POST["sexo_paciente"];
    $telefono_paciente     = $_POST["telefono_paciente"];
    $etnia_paciente        = $_POST["etnia_paciente"];
    $id_parroquia          = $_POST["parroquiamod"];    
    $email_paciente       = $_POST["email"];
    $estadocivil_paciente = $_POST["estadocivil_paciente"];
    $ocupacion            = $_POST["ocupacion"];
    $peso_paciente        = $_POST["peso_paciente"];
    $id_paciente       = $_POST["id_paciente"];
  //  $datosEstadoObj         = $_POST["datosEstadoObj"];
  //  $datosMunicipioObj      = $_POST["datosMunicipioObj"];
  //  $datosParroquiaObj         = $_POST["datosParroquiaObj"];
    $embarazada             = $_POST["embarazada"];
    $madre_lactante         = $_POST["madre_lactante"];
    $lactante               = $_POST["lactante"];


    $pac = new Paciente();

    $pac->__SET('id_paciente',$id_paciente );
    $pac->__SET('nombre_paciente', $nombre_paciente);
    $pac->__SET('apellido_paciente', $apellido_paciente);
    $pac->__SET('cedula_paciente', $cedula_paciente);
    $pac->__SET('nacionalidad_paciente', $nacionalidad_paciente);
    $pac->__SET('fecha_nacimiento', $fecha_nacimiento);
    $pac->__SET('direccion_paciente', $direccion_paciente);
    $pac->__SET('sexo_paciente', $sexo_paciente);
    $pac->__SET('telefono_paciente', $telefono_paciente);
    $pac->__SET('etnia_paciente', $etnia_paciente);
    $pac->__SET('id_usuario_sistema', $id_usuario_sistema);
    $pac->__SET('id_parroquia', $id_parroquia);
    $pac->__SET('email_paciente', $email_paciente);
    $pac->__SET('estadocivil_paciente', $estadocivil_paciente);
    $pac->__SET('ocupacion', $ocupacion);
    $pac->__SET('peso_paciente', $peso_paciente);
   // $pac->__SET('datosEstadoObj', $datosEstadoObj);
   // $pac->__SET('datosMunicipioObj', $datosMunicipioObj);
  //  $pac->__SET('datosParroquiaObj', $datosParroquiaObj);
    $pac->__SET('embarazada', $embarazada);
    $pac->__SET('madre_lactante', $madre_lactante);
    $pac->__SET('lactante', $lactante);

    $pacienteModelo = new PacienteModelo();

    $pacienteModelo->Actualizar($pac); 

}

require_once "vista/cabecera.php";
require_once 'vista/editarPaciente.php';




