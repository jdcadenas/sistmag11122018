<?php

require_once 'modelo/UsuarioSistemaModelo.php';



if (isset($_GET["editarusuario"]) and $_GET["editarusuario"] == "si") {
    $id_usuario_sistema = $_GET["id_usuario_sistema"];

    $usuariosistemaModelo = new UsuarioSistemaModelo();

    $usu = $usuariosistemaModelo->Obtener($id_usuario_sistema);  

}

require_once "vista/cabecera.php";
require_once 'vista/editarUsuario.php';

if (isset($_POST["editarusuario"]) and $_POST["editarusuario"] == "si") {

    $id_usuario_sistema       = $_POST["id_usuario_sistema"];
    $usuario_sistema     = $_POST["usuario_sistema"];
    $clave       = $_POST["clave"];
    $nombre = $_POST["nombre"];
    $apellido      = $_POST["apellido"];
    $cedula    = $_POST["cedula"];
    $id_rol         = $_POST["id_rol"];
    $telefono_usuario     = $_POST["telefono_usuario"];
    $email_usuario        = $_POST["email_usuario"];
    $fecha_creado          = $_POST["fecha_creado"];  

    $usu = new Usuario();

    $usu->__SET('id_usuario_sistema',$id_usuario_sistema );
    $usu->__SET('usuario_sistema', $usuario_sistema);
    $usu->__SET('clave', $clave);
    $usu->__SET('nombre', $nombre);
    $usu->__SET('apellido', $apellido);
    $usu->__SET('cedula', $cedula);
    $usu->__SET('id_rol', $id_rol);
    $usu->__SET('telefono_usuario', $telefono_usuario);
    $usu->__SET('email_usuario', $email_usuario);
    $usu->__SET('fecha_creado', $fecha_creado);   

    $usuariosistemaModelo = new UsuarioSistemaModelo();

    $usuariosistemaModelo->Actualizar($usu);
    

}


?>


?>
