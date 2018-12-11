<?php

require_once 'modelo/UsuarioSistemaModelo.php';


if (isset($_POST["registroUsuario"]) and $_POST["registroUsuario"] == "si") {

    $usuario_sistema = $_POST["usuario_sistema"];
    $cedula          = $_POST["cedula"];
    $nombre           = $_POST["nombre"];
    $apellido         = $_POST["apellido"];
    $clave            = $_POST["clave"];
    $id_rol           = $_POST["id_rol"];
    $telefono_usuario = $_POST["telefono_usuario"];
    $email_usuario    = $_POST["email_usuario"];
    $fecha_creado     = $_POST["fecha_creado"];

    $usu = new Usuario();

    $usu->__SET('usuario_sistema', $usuario_sistema);
    $usu->__SET('cedula', $cedula);
    $usu->__SET('nombre', $nombre);
    $usu->__SET('apellido', $apellido);
    $usu->__SET('clave', $clave);
    $usu->__SET('id_rol', $id_rol);
    $usu->__SET('telefono_usuario', $telefono_usuario);
    $usu->__SET('email_usuario', $email_usuario);
    $usu->__SET('fecha_creado', $fecha_creado);
    $usuarioModelo = new UsuarioSistemaModelo();


    $usuarioModelo->Registrar($usu);

    
}

require_once "vista/cabecera.php";
require_once 'vista/registroUsuario.php';
