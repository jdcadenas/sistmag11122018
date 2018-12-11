<?php
if ($_SESSION["descripcion"] == "administrador") {

	require_once "vista/cabecera.php";
	require_once 'vista/principal.php';
} else if ($_SESSION["descripcion"] == "secretaria") {

	require_once "vista/cabecera.php";
	require_once 'vista/principal.php';
}
