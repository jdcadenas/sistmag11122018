<?php
require_once 'modelo/pacienteModelo.php';
require_once 'modelo/pruebaModelo.php';
require_once 'modelo/parroquiaModelo.php';
require_once 'modelo/estadoModelo.php';
require_once 'modelo/municipioModelo.php';

$estados      = new EstadoModelo();
$datosEstados = $estados->Listar();

$pacientes = new PacienteModelo();
$datos     = $pacientes->Listar();




require_once "vista/cabecera.php";

require_once 'vista/consultarPaciente.php';


if (isset($_POST["eliminarregistro"]) and $_POST["eliminarregistro"] == "si") {
    $id_paciente = $_POST["id_paciente"];

    $pacienteModelo = new PacienteModelo();

    $pacienteModelo->Eliminar($id_paciente);
    
    require_once "vista/cabecera.php";

    require_once 'vista/consultarPaciente.php';

}

if (isset($_POST["buscarparroquia"]) and $_POST["buscarparroquia"] == "si") {
    $id_parrroquia = $_POST["id_parroquia"];

    
    $parroquia= new ParroquiaModelo();
    $res=$parroquia->Obtener($parrroquia);
    
    echo($res);
    

}

if (isset($_POST["guardarregistroprueba"]) and $_POST["guardarregistroprueba"] == "si") {
    //$id_paciente = $_POST["id_paciente"];
    require_once 'modelo/pruebaModelo.php';

    $tipo_prueba       =        $_POST["tipo_prueba"];
    $codigo_notificacion     = $_POST["codigo_notificacion"];
    $numero_lamina_pdrm       = $_POST["numero_lamina_pdrm"];
    $tipo_busqueda =            $_POST["tipo_busqueda"];
    $especie_plasmodium      = $_POST["especie_plasmodium"];
    $fecha_inicio_fiebre    = $_POST["fecha_inicio_fiebre"];
    $fecha_toma_lamina         = $_POST["fecha_toma_lamina"];
    $lugar_toma_lamina     = $_POST["lugar_toma_lamina"];
    $id_paciente     = $_POST["id"];


    $pru = new Prueba();

    $pru->__SET('id_pruebas', null);
    $pru->__SET('tipo_prueba', $tipo_prueba);
    $pru->__SET('codigo_notificacion', $codigo_notificacion);
    $pru->__SET('numero_lamina_pdrm', $numero_lamina_pdrm);
    $pru->__SET('tipo_busqueda', $tipo_busqueda);
    $pru->__SET('especie_plasmodium', $especie_plasmodium);
    $pru->__SET('fecha_inicio_fiebre', $fecha_inicio_fiebre);
    $pru->__SET('fecha_toma_lamina', $fecha_toma_lamina);
    $pru->__SET('lugar_toma_lamina', $lugar_toma_lamina);
    $pru->__SET('parroquia_id',34);
    $pru->__SET('id_paciente',$id_paciente);

    $pruebaModelo = new PruebaModelo();    

    $p= $pruebaModelo->Registrar($pru);
    var_dump($p);
    unset($_POST['guardarregistroprueba']);


    var_dump($_POST);
    exit();
    header('location:?accion=principal');

    exit();

}

if (isset($_POST["guardartratamiento"]) and $_POST["guardartratamiento"] == "si") {
    //$id_paciente = $_POST["id_paciente"];
    require_once 'modelo/tratamientoModelo.php';

    $nombre       =        $_POST["nombre"];
    $cantidad     = $_POST["cantidad"];
    $fecha_suministrado       = $_POST["fecha_suministrado"];
    $id_paciente     = $_POST["id_paciente"];




    $tra = new Tratamiento();

    $tra->__SET('id_tratamiento', null);
    $tra->__SET('nombre', $nombre);
    $tra->__SET('cantidad', $cantidad);
    $tra->__SET('fecha_suministrado', $fecha_suministrado);
    $tra->__SET('id_paciente',$id_paciente);

    $tratamientoModelo = new TratamientoModelo();
    
    $tratamientoModelo->Registrar($tra);

    $_POST["guardartratamiento"] = "no";
    exit();

}



if (isset($_POST["guardarcaso"]) and $_POST["guardarcaso"] == "si") {
    //$id_paciente = $_POST["id_paciente"];
    require_once 'modelo/casoModelo.php';

    //$id_caso       =        $_POST["id_caso"];
    $numero_caso     = $_POST["numero_caso"];
    $muerte       = $_POST["muerte"];
    $recaida =            $_POST["recaida"];
    
    $clasificacion_caso    = $_POST["clasificacion_caso"];
    $direccion    = $_POST["direccion"];
    $estado    = $_POST["estado"];
    $municipio = $_POST["municipio"];
    $parroquia  =$_POST["parroquia"];
    $id_paciente    = $_POST["id_paciente"];

    $EstadoObj= new EstadoModelo();
    $datosEstadoObj=$EstadoObj->Obtener($estado);

    $MunicipioObj= new MunicipioModelo();
    $datosMunicipioObj=$MunicipioObj->Obtener($municipio);

    $ParroquiaObj=new ParroquiaModelo();
    $datosParroquiaObj=$ParroquiaObj->Obtener($parroquia);


    $cas = new Caso();

    $cas->__SET('id_caso', null);
    $cas->__SET('numero_caso', $numero_caso);
    $cas->__SET('muerte', $muerte);
    $cas->__SET('recaida', $recaida);
    
    $cas->__SET('clasificacion_caso', $clasificacion_caso);
    $cas->__SET('direccion', $direccion);
    $cas->__SET('estado', $datosEstadoObj->nombre);
    $cas->__SET('municipio',$datosMunicipioObj->nombre);
    $cas->__SET('parroquia',$datosParroquiaObj->nombre);

    $casoModelo = new CasoModelo();
    
    $casoModelo->Registrar($cas,$id_paciente);

    $_POST["guardarcaso"]  = "no";
    exit();

}
