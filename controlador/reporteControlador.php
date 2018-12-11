<?php
require_once 'modelo/reporteModelo.php';

$reportediario= new ReporteModelo();


$tipo = $_GET["tipo"];

if ($tipo=="diariotra") {

	$fecha = $_GET["fecha"];



	$datosreportediatra=$reportediario-> ListarTratamientoDiario($fecha);


	require_once "vista/cabecera.php";

	require_once 'vista/reporteDiariotra.php';

	
}

if ($tipo=="fechastra") {

	$fechasinitra = $_GET["fechasinitra"];
	$fechasfintra = $_GET["fechasfintra"];



	$datosreportesemanatra=$reportediario-> ListarTratamientofechas($fechasinitra,$fechasfintra);


	require_once "vista/cabecera.php";

	require_once 'vista/reporteSemanaltra.php';	
}

if ($tipo=="mestra") {

	$mesinitra = $_GET["mesinitra"];

	$mesfintra = $_GET["mesfintra"];
	

	$datosreportemestra=$reportediario-> ListarTratamientoMes($mesinitra,$mesfintra);


	require_once "vista/cabecera.php";

	require_once 'vista/reporteMestra.php';	
}

// Inicio controlador de Pruebas Diarias, Semanales y Mensuales
//Pruebas diarias
if ($tipo=="diariopru") {

	$fecha = $_GET["fecha"];


	$datosreportediapru=$reportediario-> Listar($fecha);

	require_once "vista/cabecera.php";

	require_once 'vista/reporteDiariopru.php';

	
}
// Fin Pruebas Diarias

//Inicio PRuebas Semanales
if ($tipo=="fechaspru") {

	$fechasini = $_GET["fechasini"];
	$fechasfin = $_GET["fechasfin"];

	$datosreportesemanapru=$reportediario-> Listarfechas($fechasini,$fechasfin);

	
	require_once "vista/cabecera.php";

	require_once 'vista/reporteSemanalpru.php';	
}
// Fin Pruebas Semanales


//Inicio PRuebas Mensuales
if ($tipo=="mespru") {

	$mesini1 = $_GET["mesini1"];

	$mesfin1 = $_GET["mesfin1"];

	$datosreportemespru=$reportediario-> ListarPruebaMes($mesini1,$mesfin1);

	
	require_once "vista/cabecera.php";

	require_once 'vista/reporteMespru.php';	
}
//Fin Pruebas MEnsuales

// Fin Controlador de Pruebas Diarias, Semanales y Mensuales

//Inicio Controlador Origen PRobable de infeccion por Estado
if ($tipo=="estado") {

	$datosreporteestado=$reportediario-> ListarReporteEstado();


	require_once "vista/cabecera.php";

	require_once 'vista/reporteEstado.php';

	
}

//Inicio controlador Por Medicamentos entregados

if ($tipo=="diariosumi") {

	$fecha = $_GET["fecha"];

	$datosreportemedicina=$reportediario-> ListarTratamientoSuministrado($fecha);

	require_once "vista/cabecera.php";

	require_once 'vista/reporteMedicina.php';

	
}

if ($tipo=="semsumi") {

	$busquedaseminisumi = $_GET["busquedaseminisumi"];
	$busquedasemfinsumi = $_GET["busquedasemfinsumi"];

	$datosreportesemsumi=$reportediario-> ListarTratamientoSuministradoSemanal($busquedaseminisumi,$busquedasemfinsumi);
	
	
	require_once "vista/cabecera.php";

	require_once 'vista/reporteSemanalSumi.php';	
}

if ($tipo=="messumi") {

	$busquedamesinisumi = $_GET["busquedamesinisumi"];
	$busquedamesfinsumi = $_GET["busquedamesfinsumi"];

	$datosreportesmessumi=$reportediario-> ListarTratamientoSuministradoMensual($busquedamesinisumi,$busquedamesfinsumi);

	
	require_once "vista/cabecera.php";

	require_once 'vista/reporteMensualSumi.php';	
}




?>




