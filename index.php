<?php

session_start();
date_default_timezone_set("America/Caracas");
require_once("include/libreria.php");
include("modelo/conexion.php");
include("modelo/database.php");
if (isset($_SESSION["usulog"])) {
  if (!empty($_GET["accion"])) {
    $accion = $_GET["accion"];
  } else {
    $accion = "index";
  }

  if (is_file("controlador/" . $accion . "Controlador.php")) {
    require_once("controlador/" . $accion . "Controlador.php");
  } else {
    require_once("controlador/errorControlador.php");
  }
} else {
  require_once("controlador/indexControlador.php");
}
?>
